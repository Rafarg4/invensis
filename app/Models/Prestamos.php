<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Prestamos
 * @package App\Models
 * @version September 23, 2024, 7:54 pm -04
 *
 * @property string $id_cliente
 * @property string $monto
 * @property string $fecha_inicio
 * @property string $fecha_pago
 * @property string $fecha_vencimineto
 * @property string $cantidad_cuota
 * @property string $tipo_prestamo
 * @property string $dias_mora
 */
class Prestamos extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'prestamos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cliente',
        'monto',
        'fecha_inicio',
        'fecha_pago',
        'fecha_vencimineto',
        'cantidad_cuota',
        'tipo_prestamo',
        'dias_mora'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_cliente' => 'string',
        'monto' => 'string',
        'fecha_inicio' => 'string',
        'fecha_pago' => 'string',
        'fecha_vencimineto' => 'string',
        'cantidad_cuota' => 'string',
        'tipo_prestamo' => 'string',
        'dias_mora' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cliente' => 'required',
        'monto' => 'required',
        'fecha_inicio' => 'required',
        'fecha_pago' => 'required',
        'fecha_vencimineto' => 'required',
        'cantidad_cuota' => 'required',
        'tipo_prestamo' => 'required',
        'dias_mora' => 'required'
    ];

    
}
