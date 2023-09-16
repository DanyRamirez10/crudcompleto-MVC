<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TUser;
 
class UserController extends Controller
{
	public function actionInsert(Request $request, SessionManager $sessionManager)
    {
    if ($request->isMethod('post')) {
        $listMessage = [];

        $validator = Validator::make(
            [
                'dni' => trim($request->input('txtDNI')),
                'firstName' => trim($request->input('txtName')),
                'surName' => trim($request->input('txtFirst')),
                'email' => trim($request->input('txtCorreo')),
            ],
            [
                'dni' => ['required', 'regex:/^\d{8}$/'], // Verifica que sean 8 números
                'firstName' => 'required',
                'surName' => 'required',
                'email' => 'required|unique:tuser,email', // Verifica unicidad en la tabla tuser
            ],
            [
                'dni.required' => 'El campo "DNI" es requerido.',
                'dni.regex' => 'El DNI debe tener exactamente 8 caracteres numéricos.',
                'firstName.required' => 'El campo "apellido" es requerido.',
                'surName.required' => 'El campo "nombre" es requerido.',
                'email.required' => 'El campo "correo" es requerido.',
                'email.unique' => 'El correo ya está en uso.',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $value) {
                $listMessage[] = $value;
            }
        }

        if (count($listMessage) > 0) {
            $sessionManager->flash('listMessage', $listMessage);
            $sessionManager->flash('typeMessage', 'error');

            return redirect('user/insert');
        }

        $tUser = new TUser();

        $tUser->idUser = uniqid();
        $tUser->dni = $request->input('txtDNI');
        $tUser->firstName = $request->input('txtName');
        $tUser->surName = $request->input('txtFirst');
        $tUser->email = $request->input('txtCorreo');

        $tUser->save();

        $sessionManager->flash('listMessage', ['Registro realizado correctamente.']);
        $sessionManager->flash('typeMessage', 'success');

        // Después de la inserción, regresa a la misma vista
        return redirect('user/insert');
    }

    $listTUser = TUser::all(); // Obtén la lista inicial de usuarios
    return view('user/insert', ['listTUser' => $listTUser]);
    }


	public function actionGetAll()
	{
		$listTUser = TUser::all();

		return view('user/getall',
		[
			'listTUser' => $listTUser
		]);
	}

	public function actionDelete($idUser, SessionManager $sessionManager)
	{
		$tUser = TUser::find($idUser);
		
		if($tUser != null)
		{
			$tUser->delete();
		}

		$sessionManager->flash('listMessage', ['Registro eliminado correctamente.']);
		$sessionManager->flash('typeMessage', 'success');

		return redirect('user/insert');
	}
    
    public function actionUpdate($idUser, Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                [
                    'dni' => trim($request->input('txtDNIName')),
                    'firstName' => trim($request->input('txtFirstName')),
                    'surName' => trim($request->input('txtSurName')),
                    'email' => trim($request->input('txtEmail')),
                ],
                [
                    'dni' => ['required', 'regex:/^\d{8}$/'], // Verifica que sean 8 números
                    'firstName' => 'required',
                    'surName' => 'required',
                    'email' => "required|unique:tuser,email,$idUser,idUser", // Verifica unicidad excluyendo el usuario actual
                ],
                [
                    'dni.required' => 'El campo "DNI" es requerido.',
                    'dni.regex' => 'El DNI debe tener exactamente 8 caracteres numéricos.',
                    'firstName.required' => 'El campo "apellido" es requerido.',
                    'surName.required' => 'El campo "nombre" es requerido.',
                    'email.required' => 'El campo "correo" es requerido.',
                    'email.unique' => 'El correo ya está en uso.',
                ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();

                foreach ($errors as $value) {
                    $listMessage[] = $value;
                }
            }

            // Se busca el usuario que se está editando por su ID
            $userToUpdate = TUser::find($idUser);

            if (!$userToUpdate) {
                $listMessage[] = 'El usuario que se intenta editar no existe.';
            } else {
                // Se comprueba si el dni de la persona ya está registrado para otra persona
                $existingUser = TUser::where('idUser', '!=', $idUser)
                    ->where(function ($query) use ($request) {
                        $query->where('dni', $request->input('txtDNIName'))
                            ->orWhere('email', $request->input('txtEmail'));
                    })
                    ->first();
                    
                if ($existingUser) {
                    $listMessage[] = 'El dni de la persona o el correo ya están registrados para otra persona.';
                }
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('user/edit/' . $idUser); // Redirigir a la página de edición con el ID del usuario
            }

            // Actualizar los datos del usuario
            $userToUpdate->dni = $request->input('txtDNIName');
            $userToUpdate->firstName = $request->input('txtFirstName');
            $userToUpdate->surName = $request->input('txtSurName');
            $userToUpdate->email = $request->input('txtEmail');

            $userToUpdate->save();

            $sessionManager->flash('listMessage', ['Actualización realizada correctamente.']);
            $sessionManager->flash('typeMessage', 'success');

            return redirect('user/insert'); // Redirigir a la página que muestra todos los usuarios
        }

        // Si no es una solicitud POST, redirigir a la página de edición con el ID del usuario
        return redirect('user/edit/' . $idUser);
    }

}