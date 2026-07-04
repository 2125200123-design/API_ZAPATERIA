<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $primaryKey = 'proveedor_id';
    protected $table = 'proveedores';

      public $timestamps = false;
      public function productos()
      {
          return $this->hasMany(Producto::class, 'id_proveedor');
      }
      
      public function compras()
      {
          return $this->hasMany(Compra::class, 'id_proveedor');
      }

        public function contactos()
      {
          return $this->hasMany(Contacto::class, 'id_proveedor');
      }

}
