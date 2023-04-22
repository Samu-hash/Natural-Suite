<?php

namespace App\Models\Habitaciones;

use App\Libraries\ConexionService;
use Exception;

class HabitacionesModel
{

    private ConexionService $conexion;

    public function __construct(ConexionService $conexion)
    {
        $this->conexion = $conexion;
    }

    public function listarHabitaciones()
    {
        try {
            $sql = "select * from habitaciones where estado = 'D'";
            return $this->conexion->callSelect($sql, []);
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }

    public function obtenerPrecio($id)
    {
        try {
            $sql = "select precio_habitacion from habitaciones where id_numero_habitacion = '".$id."'";
            return $this->conexion->callSelect($sql, [])[0];
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }

    public function actualizarHabitacion($data, $id)
    {
        try {
            $sql = "habitaciones";
            return $this->conexion->callProcess($sql, $data, true, 'id_numero_habitacion', $id);
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }
}
