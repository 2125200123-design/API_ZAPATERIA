<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    protected $primaryKey = 'marca_id';
     public $timestamps = false;
        public function productos()
      {
          return $this->hasMany(Producto::class, 'id_marca');
      }
}
