'use strict';
function updateUser(idUser) {
    const newDNI = $('#txtDNIName').val();
    const newfirstName = $('#txtFirstName').val();
    const newsurName = $('#txtSurName').val();
    const newemail = $('#txtEmail').val();

    // Envía los datos actualizados mediante AJAX
    $.ajax({
        url: _urlBase + '/user/update/' + idUser, // Cambiar 'insert' por 'update'
        method: 'POST',
        data: { txtDNIName: newDNI, txtFirstName: newfirstName, txtSurName: newsurName, txtEmail: newemail }, // Corregir los nombres de los campos
        success: function(response) {
            new PNotify({
                title: 'Éxito',
                text: 'La personase actualizó correctamente.',
                type: 'success'
            });
            window.location.reload();
        },
        error: function(xhr, status, error) {
            new PNotify({
                title: 'Error',
                text: 'DNI O Correo ya esta registrada.',
                type: 'error'
            });
            window.location.reload();
        }
    });
}

function showEditModal(idUser, dniUser, firstNameUser, surNameUser, emailUser) {
    $('#txtDNIName').val(dniUser);
    $('#txtFirstName').val(firstNameUser);
    $('#txtSurName').val(surNameUser);
    $('#txtEmail').val(emailUser);
    $('#editUserModal').data('idUser', idUser); // Asignar el idCity al atributo data-idCity del modal
    $('#editUserModal').modal('show');
}
