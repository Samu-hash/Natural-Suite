import ajax from '../utility/ajax.js'

const login ={}


login.initLoginRegister = () =>{

    login._openModal()

    login._login()

    login._register()

    login.validateMenu()
}

login._openModal = () => {
    $('#menuRegisterLogin').click((e)=>{
        if($('#menuRegisterLogin > a').data('session') == 0){
            e.preventDefault()
            $('#loginRegister').modal('show')
            login.mostrarClave()
        }
    })
}

login._login = () => {
    login._validateFormLogin()

    if($('#loginForm').valid())
        $('#loginForm').submit((e)=>{
            e.preventDefault()
            ajax.postJSON({
                'url':'/back/iniciar-sesion',
                'data':{
                    'username': $('#correoLogin').val(),
                    'password': $('#claveLogin').val()
                },
                'function':(response)=>{
                    if(response.isSession){
                        //storage.saveData(true, $('#correoLogin').val(), $('#claveLogin').val())
                        $(location).attr('href', response.url)
                    }else{
                        alert(response.mensaje)
                    }
                }
            })
        })
}

login._validateFormLogin = () =>{
    $('#loginForm').validate({
        rules:{
            correoLogin:{
                required: true,
                email: true
            },
            claveLogin:{
                required: true
            }
        },
        messages:{
            correoLogin:{
                required: "El correo es requerido.",
                email: "El correo debe de ser válido."
            },
            claveLogin:{
                required: "La clave es requerida."
            }
        },
        onchange:true, 
        errorClass: 'error-validation-sm',
        errorElement: 'p',
        errorPlacement: (error, element) => {
            element.parent().append(error)
        }
    })
}

login._validateFormRegister = () =>{
    $('#registerForm').validate({
        rules: {
            nameRegister: {
                required: true
            },
            lastRegister: {
                required: true
            },
            fechaNacRegister: {
                required: true,
                age18: true
            },
            correoRegister: {
                required: true,
                email: true,
                remote: {
                    url: $("body").data().baseurl + "back/validar-correo",
                    type: "post",
                    data: { correoRegister : function(){
                        return $("#correoRegister").val();
                    }}
                }
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
            fechaNacRegister: {
                required: "Debe ingresar una fecha de nacimiento.",
                age18: "Debes tener al menos 18 años para continuar."
            },
            correoRegister: {
                required: "Debe de ingresar un correo electrónico.",
                email: "Correo electrónico no válido.",
                remote: "Correo electrónico ya existe."
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
        onchange:true, 
        errorClass: 'error-validation-sm',
        errorElement: 'p',
        errorPlacement: (error, element) => {
            element.parent().append(error)
        }
    })
}

login._register = () =>{
    login._validateFormRegister()

    $('#registerForm').submit((e)=>{
        e.preventDefault()
        if($('#registerForm').valid())
            ajax.postJSON({
                'url': '/back/crear-cuenta',
                'data':{
                    'nameRegister':$('#nameRegister').val(),
                    'lastRegister':$('#lastRegister').val(),
                    'fechaNacRegister':$('#fechaNacRegister').val(),
                    'correoRegister':$('#correoRegister').val(),
                    'claveRegister':$('#claveRegister').val()
                },
                'function': (response)=>{
                    if(response.status){
                        alert("Se ha creado la cuenta.")
                        $('#nameRegister').val("")
                        $('#lastRegister').val("")
                        $('#fechaNacRegister').val("")
                        $('#correoRegister').val("")
                        $('#claveRegister').val("")
                        $('#claveConfimRegister').val("")
                        $('#loginRegister').modal('hide')
                        location.reload()
                    }
                }
            })
    })
}

login.validateMenu = () =>{
    ajax.postJSON({
        'url':'/back/validar-sesion',
        'function': (response) =>{
            $('#menuRegisterLogin').html(response.menu)
            $('#solicitud').attr('data-modal', response.mostrarModal)
        }
    })
}

login.mostrarClave = () => {
    $("#mostrarPass, #mostrarPass2").click((e) => {
        e.preventDefault();
        var input = document.getElementById('claveRegister')
        var input2 = document.getElementById('claveConfimRegister')

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

export default login