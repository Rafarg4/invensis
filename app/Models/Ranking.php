<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ranking
 * @package App\Models
 * @version January 2, 2023, 11:49 pm UTC
 *
 * @property string $posicion
 * @property string $nombre_apellido
 * @property string $categoria
 * @property string $club
 * @property string $sexo
 * @property string $1_fecha
 * @property string $2_fecha
 * @property string $3_fecha
 * @property string $4_fecha
 * @property string $total
 */
class Ranking extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'rankings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ci',
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
        'fecha_siete',
        'fecha_ocho',
        'fecha_nueve',
        'fecha_dies',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'posicion' => 'string',
        'nombre_apellido' => 'string',
        'id_categoria' => 'integer',
        'team' => 'string',
        'sexo' => 'string',
        'primer_fecha' => 'string',
        'total' => 'string',
        'id_inscripcion' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];

    public function categoria (){
     return $this-> belongsTo('App\Models\Categoria','id_categoria');

    }
     public function inscripcion (){
     return $this-> belongsTo('App\Models\Inscripcion','id_inscripcion');

    }
}
