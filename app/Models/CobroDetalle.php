<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobroDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nro_cuota',
        'fecha_cuota',
        'monto_cuota',
        'monto_pagado',
        'fecha_pago',
    ];
}
