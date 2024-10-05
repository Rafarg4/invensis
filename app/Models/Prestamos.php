<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Prestamos
 * @package App\Models
 * @version October 2, 2024
 *
 * @property string $id_cliente
 * @property string $monto
 * @property string $fecha_inicio
 * @property string $fecha_pago
 * @property array $fechas_vencimiento
 * @property string $cantidad_cuota
 * @property string $tipo_prestamo
 * @property string $dias_mora
 * @property int $id_electrodomestico
 * @property string $zona
 */
class Prestamos extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'prestamos';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id_cliente',
        'monto',
        'fecha_inicio',
        'fecha_pago',
        'fechas_vencimiento', // Cambiado a array para múltiples fechas
        'cantidad_cuota',
        'tipo_prestamo',
        'dias_mora',
        'id_electrodomestico',
        'zona' // Nuevo campo
    ];

    protected $casts = [
        'id_cliente' => 'string',
        'monto' => 'string',
        'fecha_inicio' => 'date',
        'fecha_pago' => 'date',
        'fechas_vencimiento' => 'array', // Cambiado a array
        'cantidad_cuota' => 'string',
        'tipo_prestamo' => 'string',
        'dias_mora' => 'integer',
        'id_electrodomestico' => 'integer',
        'zona' => 'string' // Nuevo campo
    ];

    public static $rules = [
        'id_cliente' => 'required',
        'monto' => 'required',
        'fecha_inicio' => 'required|date',
        'fecha_pago' => 'required|date',
        'cantidad_cuota' => 'required|integer',
        'tipo_prestamo' => 'required',
        'dias_mora' => 'nullable|integer',
        'id_electrodomestico' => 'nullable|integer',
        'zona' => 'required|string' // Nueva regla de validación
    ];

    /**
     * Relación con el modelo Electrodomestico
     */
    public function electrodomestico()
    {
        return $this->belongsTo(Electrodomestico::class, 'id_electrodomestico');
    }
}
