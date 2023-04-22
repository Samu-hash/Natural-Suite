import ajax from '../utility/ajax.js'

const habitacion ={}

habitacion.obtenerListado = () => {
    ajax.postJSON({
        'url': '/back/obtener-habiraciones',
        'function':(response)=>{
            let opt = `<option value="">seleccionar una opcion</option>`
            $.each(response, (acc, ele) => {
                opt += `<option value="${ele.id_numero_habitacion}">[Camas: ${ele.cantidad_camas} - Baños: ${ele.cantidad_banios} - Precio: ${ele.precio_habitacion}]</option>`
            })
            $('#tipoHabitacion').html(opt)
        }
    })
}

export default habitacion