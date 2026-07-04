<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    // GET /api/marcas
    public function index()
    {
        $marcas = Marca::all();

        return response()->json($marcas);
    }

    // POST /api/marcas
    public function store(Request $request)
    {
        $marca = new Marca();

        $marca->marca = $request->marca;

        $marca->save();

        return response()->json([
            "mensaje" => "Marca registrada correctamente",
            "datos" => $marca
        ]);
    }

    // GET /api/marcas/{id}
    public function show($id)
    {
        $marca = Marca::findOrFail($id);

        return response()->json($marca);
    }

    // PUT /api/marcas/{id}
    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);

        $marca->marca = $request->marca;

        $marca->save();

        return response()->json([
            "mensaje" => "Marca actualizada correctamente",
            "datos" => $marca
        ]);
    }

    // DELETE /api/marcas/{id}
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        try {

            $marca->delete();

            return response()->json([
                "mensaje" => "Marca eliminada correctamente"
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "mensaje" => "No se puede eliminar porque la marca está siendo utilizada por otros registros."
            ]);

        }
    }
}