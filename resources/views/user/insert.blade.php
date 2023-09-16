@extends('template.layout')
@section('titleGeneral', 'Registrar ciudad...')
@section('sectionGeneral')
<form id="frmUserInsert" action="{{url('user/insert')}}" method="post">
	<div class="row">
	    <div class="col-md-2 form-group">
			<label for="">DNI</label>
			<input type="text" id="txtDNI" name="txtDNI" class="form-control">
		</div>
	    <div class="col-md-2 form-group">
			<label for="">Nombre</label>
			<input type="text" id="txtName" name="txtName" class="form-control">
		</div>
		<div class="col-md-2 form-group">
			<label for="">Apellido</label>
			<input type="text" id="txtFirst" name="txtFirst" class="form-control">
		</div>
		<div class="col-md-2 form-group">
			<label for="">correo electronico</label>
			<input type="email" id="txtCorreo" name="txtCorreo" class="form-control">
		</div>
		<div class="col-md-2 form-group">
		    <br>
			<button type="button" class="btn btn-primary" onclick="sendFrmUserInsert();">Registrar datos</button>
	    </div>
	</div>
	<!--<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="button" class="btn btn-primary" onclick="sendFrmUserInsert();">Registrar datos</button>
		</div>
	</div>-->
</form>
<!-- Agrega una tabla para mostrar la lista de usuarios -->
<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha de Registro</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listTUser as $user)
            <tr>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->surName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
				<td class="text-right">
                    <button class="btn btn-xs btn-default" onclick="showEditModal('{{$user->idUser}}', 
					'{{$user->dni}}', '{{$user->firstName}}', '{{$user->surName}}', '{{$user->email}}');">Editar</button>
                </td>
                <td class="text-right">
                    <button class="btn btn-xs btn-default" onclick="deleteUser('{{ $user->idUser }}');">Eliminar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal de edición -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="editForm">
					
					<div class="form-group">
						<label for="txtDNIName">DNI</label>
						<input type="text" class="form-control" id="txtDNIName" name="txtDNIName">
					</div>
					<div class="form-group">
						<label for="txtFirstName">Nombre</label>
						<input type="text" class="form-control" id="txtFirstName" name="txtFirstNameName">
					</div>
					<div class="form-group">
						<label for="txtSurName">Apellido</label>
						<input type="text" class="form-control" id="txtSurName" name="txtSurName">
					</div>
					<div class="form-group">
						<label for="txtEmail">Correo Electrónico</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="updateUser($('#editUserModal').data('idUser'));">Guardar cambios</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="{{asset('viewresources/user/insert.js?=9102023')}}"></script>
<script src="{{asset('viewresources/user/getall.js?=9102023')}}"></script>
<script src="{{asset('viewresources/user/update.js?=9102023')}}"></script>
@endsection

