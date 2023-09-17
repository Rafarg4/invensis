<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tarifa
 * @package App\Models
 * @version July 25, 2023, 7:27 pm -04
 *
 * @property string $tipo_plan
 * @property string $tarifa
 * @property string $descripcion
 */
class Tarifa extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tarifas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo_plan',
        'tarifa',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo_plan' => 'string',
        'tarifa' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo_plan' => 'required',
        'tarifa' => 'required',
        'descripcion' => 'required'
    ];

    
}
