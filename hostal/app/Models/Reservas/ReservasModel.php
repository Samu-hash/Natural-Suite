<?php

namespace App\Models\Reservas;

use App\Libraries\ConexionService;
use Exception;

class ReservasModel
{

    private ConexionService $conexion;

    public function __construct(ConexionService $conexion)
    {
        $this->conexion = $conexion;
    }

    public function listarReservas($isCliente, $idCliente)
    {
        try {
            $sql = "select * from reservaciones ";
            if ($isCliente) {
                $sql .= "where id_usuario = " . $idCliente;
            }
            return $this->conexion->callSelect($sql, []);
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }

    public function insertarReservas($data)
    {
        try {
            $sql = "reservaciones";
            return $this->conexion->callProcess($sql, $data, false, '');
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }

    public function actualizarReservas($data, $id)
    {
        try {
            $sql = "reservaciones";
            return $this->conexion->callProcess($sql, $data, true, 'id_reservacion', $id);
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            $this->conexion->closeConexion();
        }
    }
}
