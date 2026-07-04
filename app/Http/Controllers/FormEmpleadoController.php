<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormEmpleadoController extends Controller
{
        public function listado(){
       // return "Este es el metodo para el select * from table";
        return view('empleados/empleados');
    }
}
