<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    //
    protected $primaryKey = 'talla_id';
     public $timestamps = false;
             public function productos()
      {
          return $this->hasMany(Producto::class, 'talla_id');
      }

}
