<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $table = 'saldos';

    protected $fillable = [
        'numero_prestamo',
        'fecha_cuota',
        'monto_cuota',
        'estado'
    ];

    // Relación con el modelo Prestamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'numero_prestamo', 'numero_prestamo');
    }
}

