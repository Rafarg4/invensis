<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cobro
 * @package App\Models
 * @version September 23, 2024, 7:50 pm -04
 *
 * @property string $id_cliente
 * @property string $monto_cobro
 * @property string $fecha_cobro
 */
class Cobro extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'cobros';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_cliente',
        'id_prestamo',
        'fecha_cobro',
        'usuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_cliente' => 'string',
        'monto_cobro' => 'decimal:2',
        'fecha_cobro' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      
    ];

    /**
     * Relación con el modelo Cliente
     */

    /**
     * Relación con el modelo Saldo para obtener cuotas pendientes del cliente
     */
    public function cuotasPendientes()
    {
        return $this->hasManyThrough(
            Saldo::class,
            Prestamos::class,
            'id_cliente',       // Foreign key en Prestamos
            'numero_prestamo',  // Foreign key en Saldo
            'id_cliente',       // Foreign key en Cobro
            'numero_prestamo'   // Local key en Prestamos
        )->where('estado', 'pendiente');
    }
     public function cliente (){
     return $this-> belongsTo('App\Models\Cliente','id_cliente');

    }
}

