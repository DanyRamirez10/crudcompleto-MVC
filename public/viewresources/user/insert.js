'use strict';

$(() =>
{
	$('#frmUserInsert').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDNI:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo DNI es requerido.</b>'
						}
					}
				},
				txtName:
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">EL campo Nombre es requerido.</b>'
						}
					}
				},
				txtFirst: // Agrega la validación para txtFirst
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo Apellido es requerido.</b>'
						}
					}
				},
				txtCorreo: // Agrega la validación para correo
				{
					validators:
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo de Email es requerido.</b>'
						}
					}
				}
			}
		});
		
});


function sendFrmUserInsert() {
	var isValid = null;

	$('#frmUserInsert').data('formValidation').resetForm();
	$('#frmUserInsert').data('formValidation').validate();

	isValid = $('#frmUserInsert').data('formValidation').isValid();

	if(!isValid) {
		new PNotify(
		{
			title : 'No se pudo proceder',
			text : 'Complete y corrija toda la infirmación del formulario.',
			type : 'error'
		});

		return;
	}

	swal(
	{
		title : 'Confirmar operación',
		text : '¿Realmente desea proceder?',
		icon : 'warning',
		buttons : ['No, cancelar.', 'Si, proceder.']
	})
	.then((proceed) =>
	{
		if(proceed)
		{
			//Llamar aquí a la función para mostrar el loader.

			$('#frmUserInsert')[0].submit();
		}
	});
}