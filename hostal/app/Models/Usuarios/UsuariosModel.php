<?php
namespace App\Models\Usuarios;

use App\Libraries\ConexionService;
use Exception;

class UsuariosModel{

    private ConexionService $conexion;


    public function __construct(ConexionService $conexion)
    {
        $this->conexion = $conexion;
    }

    public function insertarUsuario($data){
        try{
            $sql = "usuarios";
            return $this->conexion->callProcess($sql, $data, false, "");
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

    public function buscarUsuarioCorreo($data){
        try{
            $sql = "select * from usuarios where correo = '" . $data['username'] ."'";
            return $this->conexion->callSelect($sql, []);
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

    public function buscarUsuarioId($id){
        try{
            $sql = "select * from usuarios where id_usuario = '" . $id ."'";
            return $this->conexion->callSelect($sql, [])[0];
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

    public function listarUsuarios($data){
        try{
            $sql = "select * from usuarios where correo <> '" . $data['correo'] ."' and estado <> 'I'";
            return $this->conexion->callSelect($sql, []);
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

    public function validarCorreo($data){
        try{
            $sql = "select count(0) as valor from usuarios where correo = '" . $data['correoRegister'] ."'";
            return $this->conexion->callSelect($sql, []);
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

    public function actualizarUsuario($data, $id){
        try{
            $sql = "usuarios";
            return $this->conexion->callProcess($sql, $data, true, 'id_usuario', $id);
        }catch(Exception $e){
            return $e->getMessage();
        }finally{
            $this->conexion->closeConexion();
        }
    }

}