<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // GET /api/compras
    public function index()
    {
        $compras = Compra::where('estado', 'Entregado')
            ->orWhere('estado', 'En Camino')
            ->orWhere('estado', 'Pendiente')
            ->get();

        return response()->json($compras);
    }

    // POST /api/compras
    public function store(Request $request)
    {
        $compra = new Compra();

        $compra->proveedor_id = $request->proveedor_id;
        $compra->gasto_total = $request->gasto_total;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->fecha_entrega = $request->fecha_entrega;
        $compra->precio = $request->precio;
        $compra->estado = $request->estado;

        $compra->save();

        return response()->json([
            "mensaje" => "Compra registrada correctamente",
            "datos" => $compra
        ]);
    }

    // GET /api/compras/{id}
    public function show($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                "mensaje" => "Compra no encontrada"
            ]);
        }

        return response()->json($compra);
    }

    // PUT /api/compras/{id}
    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                "mensaje" => "Compra no encontrada"
            ]);
        }

        $compra->proveedor_id = $request->proveedor_id;
        $compra->gasto_total = $request->gasto_total;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->fecha_entrega = $request->fecha_entrega;
        $compra->precio = $request->precio;
        $compra->estado = $request->estado;

        $compra->save();

        return response()->json([
            "mensaje" => "Compra actualizada correctamente",
            "datos" => $compra
        ]);
    }

    // DELETE /api/compras/{id}
    public function destroy($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json([
                "mensaje" => "Compra no encontrada"
            ]);
        }

        $compra->estado = "Cancelado";
        $compra->save();

        return response()->json([
            "mensaje" => "Compra cancelada correctamente"
        ]);
    }
}