<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // GET /api/contactos
    public function index()
    {
        $contactos = Contacto::all();

        return response()->json($contactos);
    }

    // POST /api/contactos
    public function store(Request $request)
    {
        $contacto = new Contacto();

        $contacto->nombre = $request->nombre;
        $contacto->correo = $request->correo;
        $contacto->telefono = $request->telefono;

        $contacto->save();

        return response()->json([
            "mensaje" => "Contacto registrado correctamente",
            "datos" => $contacto
        ]);
    }

    // GET /api/contactos/{id}
    public function show($id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return response()->json([
                "mensaje" => "Contacto no encontrado"
            ]);
        }

        return response()->json($contacto);
    }

    // PUT /api/contactos/{id}
    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return response()->json([
                "mensaje" => "Contacto no encontrado"
            ]);
        }

        $contacto->nombre = $request->nombre;
        $contacto->correo = $request->correo;
        $contacto->telefono = $request->telefono;

        $contacto->save();

        return response()->json([
            "mensaje" => "Contacto actualizado correctamente",
            "datos" => $contacto
        ]);
    }

    // DELETE /api/contactos/{id}
    public function destroy($id)
    {
        $contacto = Contacto::find($id);

        if (!$contacto) {
            return response()->json([
                "mensaje" => "Contacto no encontrado"
            ]);
        }

        try {

            $contacto->delete();

            return response()->json([
                "mensaje" => "Contacto eliminado correctamente"
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "mensaje" => "No se puede eliminar porque el contacto está relacionado con otros registros."
            ]);

        }
    }
}