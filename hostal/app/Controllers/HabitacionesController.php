<?php

namespace App\Controllers;

use App\Libraries\Mysql;
use App\Models\Habitaciones\HabitacionesModel;

class HabitacionesController extends BaseController {


    public function listarHabiraciones(){
        $habitaciones = new HabitacionesModel(new Mysql());

        return json_encode($habitaciones->listarHabitaciones());
    }
}