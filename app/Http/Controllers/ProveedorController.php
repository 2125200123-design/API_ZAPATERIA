<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // GET /api/proveedores
    public function index()
    {
        $proveedores = Proveedor::all();

        return response()->json($proveedores);
    }

    // POST /api/proveedores
    public function store(Request $request)
    {
        $proveedor = new Proveedor();

        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->contacto_id = $request->contacto_id;

        $proveedor->save();

        return response()->json([
            "mensaje" => "Proveedor registrado correctamente",
            "datos" => $proveedor
        ]);
    }

    // GET /api/proveedores/{id}
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return response()->json($proveedor);
    }

    // PUT /api/proveedores/{id}
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->contacto_id = $request->contacto_id;

        $proveedor->save();

        return response()->json([
            "mensaje" => "Proveedor actualizado correctamente",
            "datos" => $proveedor
        ]);
    }

    // DELETE /api/proveedores/{id}
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        try {

            $proveedor->delete();

            return response()->json([
                "mensaje" => "Proveedor eliminado correctamente"
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "mensaje" => "No se puede eliminar porque el proveedor está relacionado con otros registros."
            ]);

        }
    }
}