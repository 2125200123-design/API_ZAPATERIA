<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $timestamps = false;
    protected $table = 'ventas';    
    protected $primaryKey = 'venta_id';

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'metodo_pago',
        'subtotal',
        'descuento',
        'iva',
        'total',
        'fecha_venta',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'empleado_id');
    }
}