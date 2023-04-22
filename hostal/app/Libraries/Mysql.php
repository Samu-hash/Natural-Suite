<?php

namespace App\Libraries;

use App\Libraries\ConexionService;

class Mysql implements ConexionService
{
    private $db;
    private $alpha;
    private $config;

    public function __construct()
    {
        $this->config = [
            'hostname' => env('database.default.hostname'),
            'username' => env('database.default.username'),
            'password' => env('database.default.password'),
            'database' => env('database.default.database'),
            'DBDriver' => env('database.default.DBDriver'),
            'port'     => env('database.default.port'),
        ];

        $this->alpha = '?,';

        $this->db = \Config\Database::connect($this->config);
    }
    
    public function callSelect(String $sql, array $array): array{
        $query = $this->db->query($sql, $array);
        return $query->getResult('array');
    }

    public function callProcess(String $sql, array $array, bool $isUpdate, String $key, $id = null){

        $builder = $this->db->table($sql);

        if($isUpdate){
            $builder->where($key, $id);
            return $builder->update($array);
        }else{
            return $builder->insert($array);
        }
    } 

    public function closeConexion(): void
    {
        $this->db->close();
    }
}