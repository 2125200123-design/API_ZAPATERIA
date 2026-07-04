<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function listado()
    {
        $empleados = Empleado::where('estado', 'Activo')->get();
        return view(
            'Empleados_Tabla.empleados_tabla',
            compact('empleados')
        );
    }

    public function guardar(Request $request)
    {
        $empleado = new Empleado();

        $empleado->nombre = $request->nombre;
        $empleado->correo = $request->correo;
        $empleado->rfc = $request->rfc;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->edad = $request->edad;
        $empleado->contrasena = Hash::make($request->contrasena);
        $empleado->rol = $request->rol;
        $empleado->estado = $request->estado;

        $empleado->save();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'empleado_' . $empleado->empleado_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'empleado_' . $empleado->empleado_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen2 = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'empleado_' . $empleado->empleado_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen3 = url('storage/' . $ruta);
        }

        $empleado->save();

        return redirect('/Empleados_Tabla');
    }
    public function editar($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('empleados.empleados', compact('empleado'));
    }

    public function actualizar(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->nombre = $request->nombre;
        $empleado->correo = $request->correo;
        $empleado->rfc = $request->rfc;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->edad = $request->edad;
        $empleado->rol = $request->rol;
        $empleado->estado = $request->estado;

        if ($request->filled('contrasena')) {
            $empleado->contrasena = Hash::make($request->contrasena);
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'empleado_' . $empleado->empleado_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'empleado_' . $empleado->empleado_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen2 = url('storage/' . $ruta);
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'empleado_' . $empleado->empleado_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/empleados', $nombre, 'public');
            $empleado->imagen3 = url('storage/' . $ruta);
        }

        $empleado->save();

        return redirect('/Empleados_Tabla');
    }

    public function eliminar($id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->estado = 'Inactivo'; // o 0
        $empleado->save();

        return redirect('/Empleados_Tabla');
    }

}
