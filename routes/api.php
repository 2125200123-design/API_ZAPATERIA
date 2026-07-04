<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\LoginController;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VentaController;

use App\Http\Controllers\FormClienteController;
use App\Http\Controllers\FormColorController;
use App\Http\Controllers\FormCompraController;
use App\Http\Controllers\FormContactoController;
use App\Http\Controllers\FormEmpleadoController;
use App\Http\Controllers\FormMarcaController;
use App\Http\Controllers\FormProductoController;
use App\Http\Controllers\FormProveedorController;
use App\Http\Controllers\FormTallaController;
use App\Http\Controllers\FormVentaController;

use App\Http\Controllers\VistaProductoController;
use App\Http\Controllers\ClimaController;

use App\Models\Empleado;

// Route::view('/login', 'Inicio_de_sesion.inicio_de_sesion')->name('login');

// Route::post('/login', [LoginController::class, 'login']);

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::middleware('auth:empleado')->group(function () {

//     Route::view('/', 'inicio');

//     // TABLAS
//     Route::get('/Empleados_Tabla', [EmpleadoController::class, 'listado']);
//     Route::apiResource('/Contactos_Tabla', ContactoController::class);
//     Route::get('/Proveedores_Tabla', [ProveedorController::class, 'listado']);
//     Route::get('/Compras_Tabla', [CompraController::class, 'listado']);
//     Route::get('/Productos_Tabla', [ProductoController::class, 'listado']);
//     Route::get('/Tallas_Tabla', [TallaController::class, 'listado']);
//     Route::get('/Marcas_Tabla', [MarcaController::class, 'listado']);
//     Route::get('/Colores_Tabla', [ColorController::class, 'listado']);
//     Route::get('/Ventas_Tabla', [VentaController::class, 'listado']);
//     Route::get('/Clientes_Tabla', [ClienteController::class, 'listado']);

//     // FORMULARIOS
//     Route::get('/Clientes', [FormClienteController::class, 'listado']);
//     Route::apiResource('/Colores', FormColorController::class);
//     Route::apiResource('compras', FormCompraController::class);
//     Route::apiResource('/Contactos', FormContactoController::class);
//     Route::get('/Empleados', [FormEmpleadoController::class, 'listado']);
//     Route::get('/Marcas', [FormMarcaController::class, 'listado']);
//     Route::get('/Productos', [FormProductoController::class, 'listado']);
//     Route::get('/Proveedores', [FormProveedorController::class, 'listado']);
//     Route::get('/Tallas', [FormTallaController::class, 'listado']);
//     Route::get('/Ventas', [FormVentaController::class, 'listado']);

//     // GUARDAR
//     Route::post('/clientes/guardar', [ClienteController::class, 'guardar']);
        Route::apiResource('colores', ColorController::class);
        Route::apiResource('contactos', ContactoController::class);
//     Route::post('/empleados/guardar', [EmpleadoController::class, 'guardar']);
       Route::apiResource('marcas', MarcaController::class);
       Route::apiResource('tallas', TallaController::class);
//     Route::post('/ventas/guardar', [VentaController::class, 'guardar']);
       Route::apiResource('proveedores', ProveedorController::class);
//     Route::post('/productos/guardar', [ProductoController::class, 'guardar']);
        Route::apiResource('compras', CompraController::class);

//     // EDITAR
//     Route::get('/clientes/editar/{id}', [ClienteController::class, 'editar']);
//     Route::apiResource('/colores', [ColorController::class, 'editar']);
//     Route::get('/marcas/editar/{id}', [MarcaController::class, 'editar']);
//     Route::get('/empleados/editar/{id}', [EmpleadoController::class, 'editar']);
//     Route::get('/ventas/editar/{id}', [VentaController::class, 'editar']);
//     Route::get('/tallas/editar/{id}', [TallaController::class, 'editar']);
//     Route::get('/contactos/editar/{id}', [ContactoController::class, 'editar']);
//     Route::get('/proveedores/editar/{id}', [ProveedorController::class, 'editar']);
//     Route::get('/productos/editar/{id}', [ProductoController::class, 'editar']);
//     Route::get('/compras/editar/{id}', [CompraController::class, 'editar']);

//     // ACTUALIZAR
//     Route::post('/clientes/actualizar/{id}', [ClienteController::class, 'actualizar']);
//     Route::apiResource('/colores', [ColorController::class, 'actualizar']);
//     Route::post('/marcas/actualizar/{id}', [MarcaController::class, 'actualizar']);
//     Route::post('/empleados/actualizar/{id}', [EmpleadoController::class, 'actualizar']);
//     Route::post('/ventas/actualizar/{id}', [VentaController::class, 'actualizar']);
//     Route::post('/tallas/actualizar/{id}', [TallaController::class, 'actualizar']);
//     Route::post('/contactos/actualizar/{id}', [ContactoController::class, 'actualizar']);
//     Route::post('/proveedores/actualizar/{id}', [ProveedorController::class, 'actualizar']);
//     Route::post('/productos/actualizar/{id}', [ProductoController::class, 'actualizar']);
//     Route::post('/compras/actualizar/{id}', [CompraController::class, 'actualizar']);

//     // ELIMINAR
//     Route::get('/clientes/eliminar/{id}', [ClienteController::class, 'eliminar']);
//    Route::apiResource('/colores', [ColorController::class, 'eliminar']);
//     Route::delete('/marcas/eliminar/{id}', [MarcaController::class, 'eliminar']);
//     Route::get('/empleados/eliminar/{id}', [EmpleadoController::class, 'eliminar']);
//     Route::get('/ventas/eliminar/{id}', [VentaController::class, 'eliminar']);
//     Route::delete('/tallas/eliminar/{id}', [TallaController::class, 'eliminar']);
//     Route::delete('/contactos/eliminar/{id}', [ContactoController::class, 'eliminar']);
//     Route::delete('/proveedores/eliminar/{id}', [ProveedorController::class, 'eliminar']);
//     Route::get('/productos/eliminar/{id}', [ProductoController::class, 'eliminar']);
//     Route::get('/compras/eliminar/{id}', [CompraController::class, 'eliminar']);

//     // EXTRAS
//     Route::get('/vista_productos', [VistaProductoController::class, 'index']);

//     Route::get('/clima', [ClimaController::class, 'index']);

//     Route::get('/auth/google', function () {
//         return Socialite::driver('google')->redirect();
//     })->name('google.login');

//     Route::get('/auth/google/callback', function () {
//         try {
//             $googleUser = Socialite::driver('google')->user();

//             $user = Empleado::where('correo', $googleUser->getEmail())->first();

//             if (!$user) {
//                 $user = Empleado::create([
//                     'nombre' => $googleUser->getName(),
//                     'correo' => $googleUser->getEmail(),
//                     'contraseña' => bcrypt(Str::random(16)),
//                 ]);
//             }

//             Auth::login($user);

//             return redirect('/');
//             }catch (\Exception $e) {
//                 dd($e->getMessage());
//             }
        

//     });
    
// });