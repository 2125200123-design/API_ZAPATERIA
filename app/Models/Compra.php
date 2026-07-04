<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    //
     public $timestamps = false;
     protected $table = 'compras';
    protected $primaryKey = 'compra_id';
     public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'id_compra');
    }

}
