<?php

namespace App\Controllers;

use App\Libraries\Encripter;
use App\Libraries\Mysql;
use App\Models\Usuarios\UsuariosModel;

class UsuariosController extends BaseController
{

    private $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function listarUsuario()
    {
        if ($this->session->get('data') != null) {

            $usuarios = new UsuariosModel(new Mysql());
            $user = $usuarios->listarUsuarios($this->session->get('data')[0]);

            if ($this->session->get('data')[0]['id_role'] == 3) {
                foreach ($user as $key => $value) {

                    foreach ($user[$key] as $key2 => $value2) {
                        if ($key2 === "clave") {
                            $user[$key]['clave'] = Encripter::decrypt($value2);
                        }
                    }

                    $user[$key]['gestiones'] = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                      Realizar gestión
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="btn btn-success form-control" id="usuario-v-' . $value['id_usuario'] . '">Ver Datos</button></li>
                      <li><button class="btn btn-warning form-control" id="usuario-a-' . $value['id_usuario'] . '">Actualizar datos</button></li>
                      <li><button class="btn btn-danger form-control" id="usuario-e-' . $value['id_usuario'] . '">Eliminar Datos</button></li>
                    </ul>
                  </div>';
                }
                return json_encode(['url' => base_url() . 'mostrar-view-usuario', 'usuarios' => $user]);
            } else if ($this->session->get('data')[0]['id_role']  == 2) {
                foreach ($user as $key => $value) {

                    foreach ($user[$key] as $key2 => $value2) {
                        if ($key2 === "clave") {
                            $user[$key]['clave'] = Encripter::decrypt($value2);
                        }
                    }

                    $user[$key]['gestiones'] = '<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                      Realizar gestión
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><button class="btn btn-success form-control" id="usuario-v-' . $value['id_usuario'] . '">Ver Datos</button></li>
                    </ul>
                  </div>';
                }
                return json_encode(['url' => base_url() . 'mostrar-view-usuario', 'usuarios' => $user]);
            } else {
                return json_encode([]);
            }
        }
    }

    public function viewUsuario()
    {
        return view('admin/usuarios');
    }

    public function crearUsuario()
    {
        $userModel = new UsuariosModel(new Mysql());

        $post = [
            'id_role' => 1,
            'nombres' => $this->request->getVar('nameRegister'),
            'apellidos' => $this->request->getVar('lastRegister'),
            'iden_personal' => null,
            'fecha_nacimiento' => $this->request->getVar('fechaNacRegister'),
            'correo' => $this->request->getVar('correoRegister'),
            'clave' => Encripter::encrypter($this->request->getVar('claveRegister')),
            'estado' => 'A'
        ];

        $value = $userModel->insertarUsuario($post);

        return json_encode([
            'status' => $value
        ]);
    }

    public function actualizandoUsuario()
    {
        if ($this->session->get('data') != null) {
            $userModel = new UsuariosModel(new Mysql());

            $post = [
                'nombres' => $this->request->getVar('name'),
                'apellidos' => $this->request->getVar('last'),
                'iden_personal' => $this->request->getVar('iden'),
                'clave' => Encripter::encrypter($this->request->getVar('pass'))
            ];

            $identificador = $this->request->getVar('id');

            $value = $userModel->actualizarUsuario($post, $identificador);

            return json_encode(['status' => $value]);
        }
        return json_encode(['status' => 'No hay sesion activa']);
    }

    public function eliminarUsuario()
    {
        if ($this->session->get('data') != null) {

            $userModel = new UsuariosModel(new Mysql());

            $identificador = $this->request->getVar('id');
            $post = ['estado' => 'I'];

            $value = $userModel->actualizarUsuario($post, $identificador);

            return json_encode(['status' => $value]);
        }
        return json_encode(['status' => 'No hay sesion activa']);
    }
}
