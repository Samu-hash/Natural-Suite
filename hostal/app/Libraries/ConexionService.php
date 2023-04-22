<?php

namespace App\Libraries;

interface ConexionService {
    
    public function callProcess(String $query, array $array, bool $isUpdate, String $key, $identificador = null);

    public function callSelect(String $query, array $array) : array;

    public function closeConexion() :void;
}