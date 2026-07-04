<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Talla;
use App\Models\Color;
use App\Models\Proveedor;

class FormProductoController extends Controller
{
    public function listado()
    {
        $marcas = Marca::all();
        $tallas = Talla::all();
        $colores = Color::all();
        $proveedores = Proveedor::all();

        return view(
            'productos.productos',
            compact(
                'marcas',
                'tallas',
                'colores',
                'proveedores'
            )
        );
    }
}