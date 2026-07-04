<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colores';
    protected $primaryKey = 'color_id';
     public $timestamps = false;
             public function productos()
      {
          return $this->hasMany(Producto::class, 'id_color');
      }
}
