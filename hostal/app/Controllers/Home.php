<?php

namespace App\Controllers;

use App\Libraries\Encripter;
use App\Libraries\Mysql;
use App\Models\usuarios\UsuariosModel;
use Exception;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }


    public function iniciarSesion()
    {
        $userModel = new UsuariosModel(new Mysql());
        $post = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];

        $usuarios = $userModel->buscarUsuarioCorreo($post);

        if ($usuarios != []) {
            $decryp = Encripter::decrypt($usuarios[0]['clave']);

            if ($post['password'] === $decryp) {
                $session = \Config\Services::session();
                $user = $usuarios;
                $user[0]['clave'] = Encripter::decrypt($usuarios[0]['clave']);
                $session->set(['data' => $user]);

                return json_encode(['isSession' => true, 'url' => base_url() . 'dashboard']);
            } else {
                return json_encode(['isSession' => false, 'mensaje' => 'Credenciales incorrectas']);
            }
        } else {
            return json_encode(['isSession' => false, 'mensaje' => 'No se encontro datos del usuario']);
        }
    }

    public function validarCorreo()
    {
        $bool = true;
        $userModel = new UsuariosModel(new Mysql());

        $post = [
            'correoRegister' => $this->request->getVar('correoRegister'),
        ];

        $value = $userModel->validarCorreo($post);

        if ($value[0]['valor'] != "0") {
            $bool = false;
        }

        return json_encode($bool);
    }
}
