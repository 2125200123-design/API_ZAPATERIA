<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $primaryKey = 'producto_id';
     public $timestamps = false;
     public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'id_producto');
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'id_producto');
    }

        public function marca()
        {
            return $this->belongsTo(Marca::class, 'id_marca');
        }

        public function color()
        {
            return $this->belongsTo(Color::class, 'id_color');
        }

        public function talla()
        {
            return $this->belongsTo(Talla::class, 'id_talla');
        }

}