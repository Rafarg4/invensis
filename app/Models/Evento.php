<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Evento
 * @package App\Models
 * @version January 23, 2024, 6:21 pm -03
 *
 * @property string $nombre
 * @property string $fecha
 * @property string $lugar
 * @property string $modalidad
 * @property string $distancia
 * @property string $organiza
 * @property string $cupos
 * @property string $estado
 */
class Evento extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'eventos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'fecha',
        'lugar',
        'modalidad',
        'distancia',
        'organiza',
        'cupos',
        'estado',
        'imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'fecha' => 'string',
        'lugar' => 'string',
        'modalidad' => 'string',
        'distancia' => 'string',
        'organiza' => 'string',
        'cupos' => 'string',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
