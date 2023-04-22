import ajax from '../utility/ajax.js'
import reservas from './reservas.js'
import usuarios from './usuarios.js'

const dashboard = {}

dashboard.init = () => {

    dashboard._validarMenu()

    dashboard.cerrarSesion()

    dashboard.mostrarClave()

    dashboard.obtencionDatos()

}

dashboard._validarMenu = () => {
    ajax.postJSON({
        'url': '/back/validar-menu-rol',
        'function': (response) => {
            $('#menuRoles').html(response.menu)
            dashboard.gestionMenu()
        }
    })
}

dashboard.obtencionDatos = () => {
    ajax.postJSON({
        'url': '/back/obtener-datos',
        'function': (response) => {
            $('#nombreP').val(response.nombres + ' ' + response.apellidos)
            $('#idenP').val(response.iden_personal)
            $('#fechaP').val(response.fecha_nacimiento)
            $('#correoP').val(response.correo)
            $('#claveP').val(response.clave)
            $('#claveCP').val(response.clave)
        }
    })
}

dashboard.gestionMenu = () => {

    reservas.listandoReservas()

    usuarios.procesarListado()
}

dashboard.cerrarSesion = () => {
    $('#cerrarSesion').click((e) => {
        e.preventDefault()

        ajax.postJSON({
            'url': '/back/cerrar-sesion',
            'function': (response) => {
                $(location).attr('href', response.url)
            }
        })
    })
}

dashboard.mostrarClave = () => {
    $("#mostrarPass, #mostrarPass2").click((e) => {
        e.preventDefault();
        var input = document.getElementById('claveP')
        var input2 = document.getElementById('claveCP')

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


$(document).on('ready', dashboard.init())