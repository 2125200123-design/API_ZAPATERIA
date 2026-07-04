<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function listado()
    {
        $ventas = Venta::where('estado', 'pagado')->orWhere('estado', 'pendiente')->get();

        return view('Ventas_Tabla.ventas_tabla', compact('ventas'));
    }

    public function crear()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        return view('Ventas.ventas', compact('clientes', 'empleados'));
    }

    public function guardar(Request $request)
    {
        $venta = new Venta();

        $venta->cliente_id = $request->id_cliente;
        $venta->empleado_id = $request->id_empleado;
        $venta->subtotal = $request->subtotal;
        $venta->descuento = $request->descuento;
        $venta->iva = $request->iva;
        $venta->total = $request->total;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->estado = $request->estado;

        $venta->save();

        return redirect('/Ventas_Tabla');
    }

    public function editar($id)
    {
        $venta = Venta::findOrFail($id);

        $clientes = Cliente::all();
        $empleados = Empleado::all();

        return view('Ventas.ventas', compact('venta', 'clientes', 'empleados'));
    }

    public function actualizar(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);

        $venta->cliente_id = $request->id_cliente;
        $venta->empleado_id = $request->id_empleado;
        $venta->subtotal = $request->subtotal;
        $venta->descuento = $request->descuento;
        $venta->iva = $request->iva;
        $venta->total = $request->total;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->estado = $request->estado;

        $venta->save();

        return redirect('/Ventas_Tabla');
    }

    public function eliminar($id)
{
    $venta = Venta::findOrFail($id);

    $venta->estado = 'cancelado'; // o 0
    $venta->save();

    return redirect('/Ventas_Tabla');
}
}