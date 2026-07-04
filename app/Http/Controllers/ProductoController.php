<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Talla;
use App\Models\Color;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function listado()
    {
        $productos = Producto::where('estado', 'disponible')->get();

        return view(
            'Productos_Tabla.productos_tabla',
            compact('productos')
        );
    }

    public function guardar(Request $request)
    {
        //dd($request->all());

        $producto = new Producto();

        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->existencia = $request->existencia;
        $producto->imagen = 'imagenes/productos/producto_default.jpg';
        $producto->imagen2 = 'imagenes/productos/producto_default.jpg';
        $producto->imagen3 = 'imagenes/productos/producto_default.jpg';
        $producto->proveedor_id = $request->proveedor_id;
        $producto->talla_id = $request->talla_id;
        $producto->marca_id = $request->marca_id;
        $producto->color_id = $request->color_id;

        $producto->estado = $request->estado;

        $producto->save();
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'producto_' . $producto->producto_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen = url('storage/' . $ruta);
        }

        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'producto_' . $producto->producto_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen2 = url('storage/' . $ruta);
        }

        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'producto_' . $producto->producto_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen3 = url('storage/' . $ruta);
        }

        $producto->save();

        return redirect('/Productos_Tabla');
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);

        $marcas = Marca::all();
        $tallas = Talla::all();
        $colores = Color::all();
        $proveedores = Proveedor::all();

        return view(
            'productos.productos',
            compact(
                'producto',
                'marcas',
                'tallas',
                'colores',
                'proveedores'
            )
        );
    }

    public function eliminar($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->estado = 'agotado'; // o 0
        $producto->save();

        return redirect('/Productos_Tabla');
    }

    public function actualizar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->existencia = $request->existencia;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->talla_id = $request->talla_id;
        $producto->marca_id = $request->marca_id;
        $producto->color_id = $request->color_id;
        $producto->estado = $request->estado;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre = 'producto_' . $producto->producto_id . '_1.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen = url('storage/' . $ruta);
        }

        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $nombre = 'producto_' . $producto->producto_id . '_2.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen2 = url('storage/' . $ruta);
        }

        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $nombre = 'producto_' . $producto->producto_id . '_3.' . $file->getClientOriginalExtension();
            $ruta = $file->storeAs('imagenes/productos', $nombre, 'public');
            $producto->imagen3 = url('storage/' . $ruta);
        }

        $producto->save();

        return redirect('/Productos_Tabla');
    }

}