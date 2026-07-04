<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class FormVentaController extends Controller
{
    public function listado()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        return view('Ventas.ventas', compact('clientes', 'empleados'));
    }
}