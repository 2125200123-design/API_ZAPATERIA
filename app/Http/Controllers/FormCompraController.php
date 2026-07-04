<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;

class FormCompraController extends Controller
{
    public function listado()
    {
        $proveedores = Proveedor::all();

        return view(
            'compras.compras',
            compact('proveedores')
        );
    }
}