<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    // GET /api/tallas
    public function index()
    {
        $tallas = Talla::all();

        return response()->json($tallas);
    }

    // POST /api/tallas
    public function store(Request $request)
    {
        $talla = new Talla();

        $talla->talla = $request->talla;

        $talla->save();

        return response()->json([
            "mensaje" => "Talla registrada correctamente",
            "datos" => $talla
        ]);
    }

    // GET /api/tallas/{id}
    public function show($id)
    {
        $talla = Talla::findOrFail($id);

        return response()->json($talla);
    }

    // PUT /api/tallas/{id}
    public function update(Request $request, $id)
    {
        $talla = Talla::findOrFail($id);

        $talla->talla = $request->talla;

        $talla->save();

        return response()->json([
            "mensaje" => "Talla actualizada correctamente",
            "datos" => $talla
        ]);
    }

    // DELETE /api/tallas/{id}
    public function destroy($id)
    {
        $talla = Talla::findOrFail($id);

        try {

            $talla->delete();

            return response()->json([
                "mensaje" => "Talla eliminada correctamente"
            ]);

        } catch (\Exception $e) {

            return response()->json([
                "mensaje" => "No se puede eliminar porque la talla está siendo utilizada por otros registros."
            ]);

        }
    }
}