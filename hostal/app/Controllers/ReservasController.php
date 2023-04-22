<?php

namespace App\Controllers;

use App\Libraries\Mysql;
use App\Models\Habitaciones\HabitacionesModel;
use App\Models\Reservas\ReservasModel;
use App\Models\Usuarios\UsuariosModel;

class ReservasController extends BaseController
{

  private $session;

  public function __construct()
  {
    $this->session = \Config\Services::session();
    $this->session->start();
  }

  public function listarReservas()
  {
    if ($this->session->get('data') != null) {
      $reservas = new  ReservasModel(new Mysql());
      $usuarios = new UsuariosModel(new Mysql());
      $res = [];
      if ($this->session->get('data')[0]['id_role'] == 1) {
        $res = $reservas->listarReservas(true, $this->session->get('data')[0]['id_usuario']);
        foreach ($res as $key => $value) {
          $res[$key]['usuario'] = $usuarios->buscarUsuarioId($value['id_usuario']);
          $res[$key]['gestiones'] = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                      Realizar gestión
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="btn btn-success form-control" id="reservas-v-' . $value['id_reservacion'] . '">Ver Datos</button></li>
                    </ul>
                  </div>';
        }
        return json_encode(['url' => base_url() . 'mostrar-view-reservas', 'reservas' => $res]);
      } else if ($this->session->get('data')[0]['id_role'] == 2) {
        $res = $reservas->listarReservas(false, null);
        foreach ($res as $key => $value) {
          $res[$key]['usuario'] = $usuarios->buscarUsuarioId($value['id_usuario']);
          $res[$key]['gestiones'] = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                      Realizar gestión
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="btn btn-success form-control" id="reservas-v-' . $value['id_reservacion'] . '">Ver Datos</button></li>
                      <li><button class="btn btn-warning form-control" id="reservas-a-' . $value['id_reservacion'] . '">Actualizar datos</button></li>
                    </ul>
                  </div>';
        }
        return json_encode(['url' => base_url() . 'mostrar-view-reservas', 'reservas' => $res]);
      } else {
        $res = $reservas->listarReservas(false, null);
        foreach ($res as $key => $value) {
          $res[$key]['usuario'] = $usuarios->buscarUsuarioId($value['id_usuario']);
          $res[$key]['gestiones'] = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                      Realizar gestión
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="btn btn-success form-control" id="reservas-v-' . $value['id_reservacion'] . '">Ver Datos</button></li>
                      <li><button class="btn btn-warning form-control" id="reservas-a-' . $value['id_reservacion'] . '">Actualizar datos</button></li>
                      <li><button class="btn btn-danger form-control" id="reservas-e-' . $value['id_reservacion'] . '">Eliminar Datos</button></li>
                    </ul>
                  </div>';
        }
        return json_encode(['url' => base_url() . 'mostrar-view-reservas', 'reservas' => $res]);
      }
    }
    return json_encode(['status' => 'No hay sesion activa']);
  }

  public function actualizarReservas()
  {
    if ($this->session->get('data') != null) {

      $reservas = new  ReservasModel(new Mysql());
      $habitacion = new  HabitacionesModel(new Mysql());

      $post = [
        'atencion_extra' => $this->request->getVar('atencion_extra'),
        'precio_total' => $this->request->getVar('precio_total'),
        'estado_reservacion' => $this->request->getVar('estado_reservacion')
      ];

      $iden = [
        'id_reservacion' => $this->request->getVar('id_reservacion'),
        'id_numero_habitacion' => $this->request->getVar('id_numero_habitacion'),
      ];
      $value = $reservas->actualizarReservas($post, $iden['id_reservacion']);

      if ($value && $post['estado_reservacion'] == 'FINALIZADO') {
        $habitacion->actualizarHabitacion(['estado' => 'D'], $iden['id_numero_habitacion']);
      }
      return json_encode(['status' => $value]);
    }
    return json_encode(['status' => 'No hay sesion activa']);
  }

  public function procesarReservas()
  {
    if ($this->session->get('data') != null) {

      if ($this->session->get('data')[0]['id_role'] == 1) {
        $reservas = new  ReservasModel(new Mysql());
        $habitacion = new  HabitacionesModel(new Mysql());

        $post = [
          'id_numero_habitacion' => $this->request->getVar('id_numero_habitacion'),
          'id_usuario' => $this->session->get('data')[0]['id_usuario'],
          'fecha_desde' => $this->request->getVar('fecha_desde'),
          'fecha_hasta' => $this->request->getVar('fecha_hasta'),
          'estado_reservacion' => 'PENDIENTE'
        ];

        $post['precio_total'] = $habitacion->obtenerPrecio($post['id_numero_habitacion'])['precio_habitacion'];
        $value = $reservas->insertarReservas($post);

        if ($value) {
          $habitacion->actualizarHabitacion(['estado' => 'O'], $post['id_numero_habitacion']);
        }

        return json_encode(['status' => $value]);
      } else {
        return json_encode(['status' => false, 'message'=>'Solo pueden hacer reservas los clientes.']);
      }
    }
    return json_encode(['status' => false, 'message'=>'No hay sesion activa']);
  }

  public function eliminarReservas(){
    if ($this->session->get('data') != null) {
      $reservas = new  ReservasModel(new Mysql());

      $post = [
        'id_reservacion' => $this->request->getVar('id_reservacion')
      ];

      $value = $reservas->actualizarReservas(['estado_reservacion'=>'REMOVIDA'], $post['id_reservacion']);

      return json_encode(['status' => $value]);
    }
    return json_encode(['status' => 'No hay sesion activa']);
  }

  public function viewReservas()
  {
    return view('admin/reservas');
  }
}
