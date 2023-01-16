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
        'posicion',
        'nombre_apellido',
        'id_categoria',
        'club',
        'sexo',
        'primer_fecha',
        'segundo_fecha',
        'tercero_fecha',
        'cuarto_fecha',
        'total',
        'id_user'
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
        'club' => 'string',
        'sexo' => 'string',
        'primer_fecha' => 'string',
        'segundo_fecha' => 'string',
        'tercero_fecha' => 'string',
        'cuarto_fecha' => 'string',
        'total' => 'string',
        'id_user' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'posicion' => 'required',
        'nombre_apellido' => 'required',
        'id_categoria' => 'required',
        'club' => 'required',
        'sexo' => 'required',
        'primer_fecha' => 'required',
        'segundo_fecha' => 'required',
        'tercero_fecha' => 'required',
        'cuarto_fecha' => 'required',
        'total' => 'required',
        'id_user' => 'required'
    ];

    public function categoria (){
     return $this-> belongsTo('App\Models\Categoria','id_categoria');

    }
     public function usuario (){
     return $this-> belongsTo('App\Models\User','id_user');

    }
}
