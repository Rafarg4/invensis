<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cierre
 * @package App\Models
 * @version September 23, 2024, 7:48 pm -04
 *
 * @property string $id_cobrador
 * @property string $monto_cierre
 * @property string $fecha_cierre
 */
class Cierre extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cierres';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cobrador',
        'monto_cierre',
        'fecha_cierre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_cobrador' => 'string',
        'monto_cierre' => 'string',
        'fecha_cierre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cobrador' => 'required',
        'monto_cierre' => 'required',
        'fecha_cierre' => 'requried'
    ];

    
}
