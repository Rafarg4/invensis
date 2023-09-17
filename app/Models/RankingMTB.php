<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RankingMTB
 * @package App\Models
 * @version August 20, 2023, 4:18 pm -04
 *
 * @property string $posicion
 * @property string $nombre_apellido
 * @property string $categoria
 * @property string $club
 * @property string $sexo
 * @property string $primer_fecha
 * @property string $total
 * @property string $ci
 */
class RankingMTB extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ranking_m_t_bs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'posicion',
        'nombre_apellido',
        'categoria',
        'team',
        'fecha_uno',
        'fecha_dos',
        'fecha_tres',
        'fecha_cuatro',
        'fecha_cinco',
        'fecha_seis',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'posicion' => 'string',
        'nombre_apellido' => 'string',
        'categoria' => 'string',
        'club' => 'string',
        'sexo' => 'string',
        'primer_fecha' => 'string',
        'total' => 'string',
        'ci' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'posicion' => 'required',
        'nombre_apellido' => 'required',
        'categoria' => 'required',
        'club' => 'required',
        'sexo' => 'required',
        'primer_fecha' => 'required',
        'total' => 'required',
        'ci' => 'required'
    ];

    
}
