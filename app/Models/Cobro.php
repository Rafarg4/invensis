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
    use SoftDeletes;

    use HasFactory;

    public $table = 'cobros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cliente',
        'monto_cobro',
        'fecha_cobro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_cliente' => 'string',
        'monto_cobro' => 'string',
        'fecha_cobro' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cliente' => 'required',
        'monto_cobro' => 'required',
        'fecha_cobro' => 'required'
    ];

    
}
