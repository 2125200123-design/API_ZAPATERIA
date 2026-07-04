<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function listado()
    {
        $clientes = Cliente::where('estado', 'Activo')->get();

        return view(
            'Clientes_Tabla.clientes_tabla',
            compact('clientes')
        );
    }

    public function guardar(Request $request)
    {
        //dd($request->all());
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->rfc = $request->rfc;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->edad = $request->edad;
        $cliente->contrasena = Hash::make($request->contrasena);
        $cliente->estado = $request->estado;
        $cliente->imagen = 'imagenes/clientes/cliente_default.jpg';
        $cliente->imagen2 = 'imagenes/clientes/cliente_default.jpg';
        $cliente->imagen3 = 'imagenes/clientes/cliente_default.jpg';

        $cliente->save();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'cliente_' . $cliente->cliente_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'cliente_' . $cliente->cliente_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen2 = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'cliente_' . $cliente->cliente_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen3 = url('storage/' . $ruta);
        }

        $cliente->save();

        return redirect('/Clientes_Tabla');
    }

    public function editar($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.clientes', compact('cliente'));
    }

    public function actualizar(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->rfc = $request->rfc;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->edad = $request->edad;
        $cliente->estado = $request->estado;
        $cliente->imagen = $cliente->imagen ?? 'imagenes/clientes/cliente_default.jpg';
        $cliente->imagen2 = $cliente->imagen2 ?? 'imagenes/clientes/cliente_default.jpg';
        $cliente->imagen3 = $cliente->imagen3 ?? 'imagenes/clientes/cliente_default.jpg';

        if ($request->filled('contrasena')) {
            $cliente->contrasena = Hash::make($request->contrasena);
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'cliente_' . $cliente->cliente_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'cliente_' . $cliente->cliente_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen2 = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'cliente_' . $cliente->cliente_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/clientes', $nombre, 'public');
            $cliente->imagen3 = url('storage/' . $ruta);
        }

        $cliente->save();

        return redirect('/Clientes_Tabla');
    }

    public function eliminar($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->estado = 'Inactivo'; // o 0
        $cliente->save();

        return redirect('/Clientes_Tabla');
    }

}