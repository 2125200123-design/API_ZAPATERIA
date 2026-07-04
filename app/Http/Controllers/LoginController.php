<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->contrasena,
            'estado' => 'Activo'
        ];

        if (Auth::guard('empleado')->attempt($credenciales)) {
            $empleado = Auth::guard('empleado')->user();

            // Solo los administradores pueden entrar
            if ($empleado->rol != 'Administrador') {
                Auth::guard('empleado')->logout();

                return back()->withErrors([
                    'error' => 'No tienes permisos de administrador'
                ]);
            }

            $request->session()->regenerate();

            return redirect('/');
        }

        $empleado = Empleado::where(
            'correo',
            $request->correo
        )->first();

        if ($empleado && $empleado->estado != 'Activo') {
            return back()->withErrors([
                'error' => 'Cuenta inactiva'
            ]);
        }

        return back()->withErrors([
            'error' => 'Correo o contraseña incorrectos'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}