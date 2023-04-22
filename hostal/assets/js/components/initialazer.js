import habitacion from './Secure/habitacion.js'
import login from './Secure/login.js'
import reservas from './Secure/reservas.js'

const loadInit = () => {
    habitacion.obtenerListado()
    login.initLoginRegister()
    reservas.procesarReserva()
    
}

$(document).on('ready', loadInit())