<?php

namespace App\Http\Controllers;

use App\Models\Contacto;

class FormProveedorController extends Controller
{
    public function listado()
    {
        $contactos = Contacto::all();

        return view(
            'proveedores.proveedores',
            compact('contactos')
        );
    }
}
