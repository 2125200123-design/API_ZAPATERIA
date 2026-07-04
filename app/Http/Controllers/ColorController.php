<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // GET /api/colores
    public function index()
    {
        $colores = Color::all();

        return response()->json($colores);
    }

    // POST /api/colores
    public function store(Request $request)
    {
        $color = new Color();

        $color->color = $request->color;

        $color->save();

        return response()->json([
            "mensaje" => "Color registrado correctamente",
            "datos" => $color
        ]);
    }

    // GET /api/colores/{id}
    public function show($id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                "mensaje" => "Color no encontrado"
            ]);
        }

        return response()->json($color);
    }

    // PUT /api/colores/{id}
    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                "mensaje" => "Color no encontrado"
            ]);
        }

        $color->color = $request->color;

        $color->save();

        return response()->json([
            "mensaje" => "Color actualizado correctamente",
            "datos" => $color
        ]);
    }

    // DELETE /api/colores/{id}
    public function destroy($id)
    {
        $color = Color::find($id);

        if (!$color) {
            return response()->json([
                "mensaje" => "Color no encontrado"
            ]);
        }

        $color->delete();

        return response()->json([
            "mensaje" => "Color eliminado correctamente"
        ]);
    }
}