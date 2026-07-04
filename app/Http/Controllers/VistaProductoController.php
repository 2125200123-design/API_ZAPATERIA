<?php

namespace App\Http\Controllers;

use App\Models\VistaProducto;

class VistaProductoController extends Controller
{
    public function index()
    {
        $productos = VistaProducto::all();

        return view('vista_productos.index', compact('productos'));
    }
}