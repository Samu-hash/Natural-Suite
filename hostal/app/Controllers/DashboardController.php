<?php

namespace App\Controllers;

use App\Libraries\Encripter;

class DashboardController extends BaseController
{

    private $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if ($this->session->get('data') != null) {
            return view('admin/index');
        } else {
            return view('index');
        }
    }

    public function validarMenuSesionRol()
    {
        if ($this->session->get('data') != null) {

            if ($this->session->get('data')[0]['id_role'] == 1 || $this->session->get('data')[0]['id_role']  == 2) {
                return json_encode([
                    'menu' => '<div class="sidebar-heading">Reservas</div><li class="nav-item">
                <a id="reservasLink" class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i><span>Reservas</span></a></li>'
                ]);
            } else {
                return json_encode([
                    'menu' => '<div class="sidebar-heading">Usuarios</div><li class="nav-item"><a id="usuariosLink" class="nav-link" href="#">
                    <i class="fas fa-fw fa-user"></i><span>Usuarios</span></a></li><hr class="sidebar-divider">
                    <div class="sidebar-heading">Reservas</div><li class="nav-item"><a id="reservasLink" class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i><span>Gestion de reservas</span></a></li>'
                ]);
            }
        }
    }

    public function validarLogin()
    {
        if ($this->session->get('data') != null) {
            return json_encode([
                'mostrarModal' => false,
                'menu' => '<a href="' . base_url() . 'dashboard" data-session="1" class="nav-link">Dashboard</a>'
            ]);
        } else {
            return json_encode([
                'mostrarModal' => true,
                'menu' => '<a href="' . base_url() . '" data-session="0" class="nav-link">Iniciar Sesión</a>'
            ]);
        }
    }

    public function cerrarSesion()
    {
        if ($this->session->get('data') != null) {
            $this->session->remove('data');
            return json_encode(['url' => base_url()]);
        }
    }

    public function obtenerDatos()
    {
        if ($this->session->get('data') != null) {
            return json_encode($this->session->get('data')[0]);
        }
        return json_encode(['status' => 'No hay sesion activa']);
    }
}
