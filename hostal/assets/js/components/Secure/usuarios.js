import ajax from '../utility/ajax.js'

const usuarios = {}

usuarios.procesarListado = () => {

    $('#usuariosLink').click((e) => {
        e.preventDefault()
        usuarios.__listandoUsuarios()
    })
}

usuarios.__listandoUsuarios = () => {
    ajax.postJSON({
        'url': '/back/listar-usuarios',
        'function': (response) => {
            $('#tituloContenido').text('Usuarios')
            $('#tableUsuarios > tbody').append('')
            $("#detalleContenido").load(response.url, () => {
                response.usuarios.forEach(element => {
                    let tbody = `<tr>
                    <td>${element.nombres} ${element.apellidos}</td>
                    <td>${element.correo}</td>
                    <td>${element.estado == 'A' ? 'Activo' : 'Inactivo'}</td>
                    <td>${element.fecha_nacimiento}</td>
                    <td>${element.iden_personal == null ? 'N/A' : element.iden_personal}</td>
                    <td>${element.gestiones}</td>
                    </tr>`
                    $('#tableUsuarios > tbody').append(tbody)
                    usuarios._procesarView(element)
                    usuarios._procesarUpdate(element)
                    usuarios._procesarDelete(element)
                })
                usuarios.mostrarClave()
            })
        }
    })
}

usuarios._procesarView = (element) => {
    $(`#usuario-v-${element.id_usuario}`).click((e) => {
        e.preventDefault()
        $('#registerView').css('display', 'block')
        $('#remove').css('display', 'none')
        $('#verModalLabel').text('Mostrando Usuario')
        $('#nameGestion').val(element.nombres)
        $('#lastGestion').val(element.apellidos)
        $('#fechaNacGestion').val(element.fecha_nacimiento)
        $('#correoGestion').val(element.correo)
        $('#claveGestion').val(element.clave)
        $('#claveConfimGestion').val(element.clave)

        $("#registerView :input").prop("disabled", true);

        $("#registerView :input[type=submit]").css('display', 'none')

        $('#gestionUsuarioModal').modal('show')
    })
}

usuarios._procesarUpdate = (element) => {
    $(`#usuario-a-${element.id_usuario}`).click((e) => {

        usuarios._validateFormUpdate()
        e.preventDefault()
        $('#registerView').css('display', 'block')
        $('#remove').css('display', 'none')

        $("#registerView :input").prop("disabled", false);

        $('#verModalLabel').text('Actualizando Usuario')
        $('#nameGestion').val(element.nombres)
        $('#lastGestion').val(element.apellidos)
        $('#idenPersonalGestion').val(element.iden_personal)
        $('#fechaNacGestion').val(element.fecha_nacimiento).prop("disabled", true);
        $('#correoGestion').val(element.correo).prop("disabled", true);
        $('#claveGestion').val(element.clave)
        $('#claveConfimGestion').val(element.clave)
        $("#registerView :input[type=submit]").css('display', 'block')
        $('#gestionUsuarioModal').modal('show')

        $("#registerView").submit((e) => {
            e.preventDefault()
            if ($("#registerView").valid())
                ajax.postJSON({
                    'url': '/back/actualizando-usuario',
                    'data': {
                        'id': element.id_usuario,
                        'name': $('#nameGestion').val(),
                        'last': $('#lastGestion').val(),
                        'iden': $('#idenPersonalGestion').val(),
                        'pass': $('#claveGestion').val(),
                    },
                    'function': (response) => {
                        if (response.status) {
                            $('#gestionUsuarioModal').modal('hide')
                            alert('Se ha actualizado el registro')
                            usuarios.__listandoUsuarios()
                        } else {
                            alert('no se pudo actualizar')
                        }
                    }
                })
        })
    })
}

usuarios._validateFormUpdate = () => {
    $('#registerView').validate({
        rules: {
            nameGestion: {
                required: true
            },
            lastGestion: {
                required: true
            },
            idenPersonalGestion: {
                required: true,
            },
            claveRegister: {
                required: true,
                minlength: 6
            },
            claveConfimRegister: {
                required: true,
                equalTo: "#claveRegister",
            },
        },
        messages: {
            nameRegister: {
                required: "El campo nombre es requerido."
            },
            lastRegister: {
                required: "El campo apellido es requerido."
            },
            idenPersonalGestion: {
                required: "Debe ingresar un documento de identidad."
            },
            claveRegister: {
                required: "Por favor ingrese una clave.",
                minlength: "El mínimo de caracteres permitidos es 6."
            },
            claveConfimRegister: {
                required: "Por favor confirme su clave.",
                equalTo: "Las claves nos coinciden."
            },
        },
        onchange: true,
        errorClass: 'error-validation-sm',
        errorElement: 'p',
        errorPlacement: (error, element) => {
            element.parent().append(error)
        }
    })
}

usuarios._procesarDelete = (element) => {
    $(`#usuario-e-${element.id_usuario}`).click((e) => {
        e.preventDefault()
        $('#registerView').css('display', 'none')
        $('#remove').css('display', 'block')
        $('#verModalLabel').text('Removiendo Usuario')

        $('#remove').html(`<h4>¿Desea eliminar el registro?</h4><br/><br/>
        <button class="btn btn-danger form-control" id="del-${element.id_usuario}">Eliminar Registro</button>`)

        $('#gestionUsuarioModal').modal('show')

        $(`#del-${element.id_usuario}`).click((e) => {
            e.preventDefault()
            ajax.postJSON({
                'url': '/back/eliminar-usuario',
                'data': { 'id': element.id_usuario },
                'function': (response) => {
                    if (response.status) {
                        $('#gestionUsuarioModal').modal('hide')
                        alert('Se elimino el usuario')
                        usuarios.__listandoUsuarios()
                    } else {
                        alert('no se elimino el usuario')
                    }
                }
            })
        })
    })
}

usuarios.mostrarClave = () => {
    $("#mostrarPassGestion, #mostrarPass2Gestion").click((e) => {
        e.preventDefault();
        var input = document.getElementById('claveGestion')
        var input2 = document.getElementById('claveConfimGestion')
        if (input.type == "password" || input2.type == "password") {
            input.type = "text"
            input2.type = "text"
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            input.type = "password"
            input2.type = "password"
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    })
}

export default usuarios