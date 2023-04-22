import ajax from '../utility/ajax.js'

const reservas = {}

reservas.procesarReserva = () => {
    reservas._validateForm()
    $('#solicitud').submit((e) => {
        e.preventDefault()
        if ($('#solicitud').data('modal')) {
            if ($('#solicitud').valid())
                $('#loginRegister').modal('show')
        } else {
            if ($('#solicitud').valid())
                ajax.postJSON({
                    'url': '/back/porcesar-reservas',
                    'data': {
                        'fecha_desde': $('#fechaIni').val(),
                        'fecha_hasta': $('#fechaFin').val(),
                        'id_numero_habitacion': $('#tipoHabitacion').val()
                    },
                    'function': (response) => {
                        if (response.status) {
                            alert(`Se ha reservado la habitacion #-${$('#tipoHabitacion').val()}`)
                            location.reload()
                        } else {
                            if (response.message) {
                                alert(response.message)
                            } else
                                alert('No se pudo realizar la reserva')
                        }
                    }
                })
        }
    })
}

reservas._validateForm = () => {
    $('#solicitud').validate({
        rules: {
            fechaIni: {
                required: true
            },
            fechaFin: {
                required: true,
                greaterThan: '#fechaIni'
            },
            tipoHabitacion: {
                required: true
            }
        },
        messages: {
            fechaIni: {
                required: "Debe seleccionar una fecha de inicio."
            },
            fechaFin: {
                required: "Debe seleccionar una fecha fin.",
                greaterThan: "La fecha de fin debe ser mayor o igual a la fecha de inicio"
            },
            tipoHabitacion: {
                required: "Debe seleccionar habitación."
            }
        },
        onchange: true,
        errorClass: 'error-validation-sm',
        errorElement: 'p',
        errorPlacement: (error, element) => {
            element.parent().append(error);
        }
    })
}

reservas.listandoReservas = () => {

    $('#reservasLink').click((e) => {
        e.preventDefault()
        ajax.postJSON({
            'url': '/back/listar-reservas',
            'function': (response) => {
                $('#tituloContenido').text('Reservas')
                $('#tableReservas > tbody').append('')
                $("#detalleContenido").load(response.url, () => {
                    response.reservas.forEach(element => {
                        let tbody = `<tr>
                    <td>${element.id_numero_habitacion}</td>
                    <td>${element.usuario.nombres + ' ' + element.usuario.apellidos}</td>
                    <td>${element.fecha_desde}</td>
                    <td>${element.fecha_hasta}</td>
                    <td>${element.atencion_extra == null ? '0.0' : element.atencion_extra}</td>
                    <td>${element.precio_total == null ? '0.0' : element.precio_total}</td>
                    <td>${element.estado_reservacion}</td>
                    <td>${element.gestiones}</td>
                    </tr>`
                        $('#tableReservas > tbody').append(tbody)
                        reservas._procesarView(element)
                        reservas._procesarUpdate(element)
                        reservas._procesarDelete(element)
                    })
                })
            }
        })
    })

}


reservas._procesarView = (element) => {
    $(`#reservas-v-${element.id_reservacion}`).click((e) => {
        e.preventDefault()
        $('#registerReservasView').css('display', 'block')
        $('#remove').css('display', 'none')
        $('#verModalLabel').text('Mostrando Reservas')
        $('#numeroHabitacionReserva').val(element.id_numero_habitacion)
        $('#usuarioReserva').val(`${element.usuario.nombres + ' ' + element.usuario.apellidos}`)
        $('#fechaDesdeReserva').val(element.fecha_desde)
        $('#fechaHastaReservas').val(element.fecha_hasta)
        $('#costoExtraReserva').val(element.atencion_extra)
        $('#costoTotalReserva').val(element.precio_total)
        $('#estadoReserva').val(element.estado_reservacion)

        $("#registerReservasView :input").prop("disabled", true);

        $("#registerReservasView :input[type=submit]").css('display', 'none')

        $('#gestionReservasModal').modal('show')
    })
}

reservas._procesarUpdate = (element) => {
    $(`#reservas-a-${element.id_reservacion}`).click((e) => {

        reservas._validateFormUpdate()
        e.preventDefault()
        $('#gestionReservasModal').css('display', 'block')
        $('#remove').css('display', 'none')

        $("#gestionReservasModal :input").prop("disabled", false);

        $('#verModalLabel').text('Actualizando Usuario')
        $('#numeroHabitacionReserva').val(element.id_numero_habitacion).prop("disabled", true)
        $('#usuarioReserva').val(`${element.usuario.nombres + ' ' + element.usuario.apellidos}`).prop("disabled", true)
        $('#fechaDesdeReserva').val(element.fecha_desde).prop("disabled", true)
        $('#fechaHastaReservas').val(element.fecha_hasta).prop("disabled", true)
        $('#costoExtraReserva').val(element.atencion_extra)
        $('#costoTotalReserva').val(element.precio_total).prop("disabled", true)
        $('#estadoReserva').val(element.estado_reservacion).prop("disabled", true)
        $('#gestionReservasModal').modal('show')

        $("#registerReservasView").submit((e) => {
            e.preventDefault()
            if ($("#registerReservasView").valid())
                ajax.postJSON({
                    'url': '/back/actualizar-reservas',
                    'data': {
                        'id_reservacion': element.id_reservacion,
                        'id_numero_habitacion': element.id_numero_habitacion,
                        'atencion_extra': $('#costoExtraReserva').val(),
                        'precio_total': $('#costoTotalReserva').val(),
                        'estado_reservacion': $('#estadoReserva').val() == 'PENDIENTE' ? 'OCUPADO' : 'FINALIZADO'
                    },
                    'function': (response) => {
                        if (response.status) {
                            $('#gestionReservasModal').modal('hide')
                            alert('Se ha actualizado el registro')
                            reservas.listandoReservas()
                        } else {
                            alert('no se pudo actualizar')
                        }
                    }
                })
        })
    })
}

reservas._procesarDelete = (element) => {
    $(`#reservas-e-${element.id_reservacion}`).click((e) => {
        e.preventDefault()
        $('#registerReservasView').css('display', 'none')
        $('#remove').css('display', 'block')
        $('#verModalLabel').text('Removiendo Usuario')

        $('#remove').html(`<h4>¿Desea eliminar el registro?</h4><br/><br/>
        <button class="btn btn-danger form-control" id="del-${element.id_reservacion}">Eliminar Registro</button>`)

        $('#gestionReservasModal').modal('show')

        $(`#del-${element.id_reservacion}`).click((e) => {
            e.preventDefault()
            ajax.postJSON({
                'url': '/back/eliminar-reserva',
                'data': { 'id_reservacion': element.id_reservacion },
                'function': (response) => {
                    if (response.status) {
                        $('#gestionReservasModal').modal('hide')
                        alert('Se elimino la reserva')
                        reservas.listandoReservas()
                    } else {
                        alert('no se elimino la reserva')
                    }
                }
            })
        })
    })
}


reservas._validateFormUpdate = () => {
    $('#registerReservasView').validate({
        rules: {
            numeroHabitacionReserva: {
                required: true
            },
            costoTotalReserva: {
                required: true
            }
        },
        messages: {
            numeroHabitacionReserva: {
                required: "El campo es requerido."
            },
            costoTotalReserva: {
                required: "El campo es requerido."
            }
        },
        onchange: true,
        errorClass: 'error-validation-sm',
        errorElement: 'p',
        errorPlacement: (error, element) => {
            element.parent().append(error)
        }
    })
}

export default reservas
