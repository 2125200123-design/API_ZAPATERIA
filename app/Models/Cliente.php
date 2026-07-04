<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
     public $timestamps = false;
      protected $primaryKey = 'cliente_id';
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }
}
