<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inscripcion
 * @package App\Models
 * @version December 17, 2022, 11:55 am UTC
 *
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $fechanac
 * @property string $ci
 * @property string $sexo
 * @property string $grupo_sanguineo
 * @property string $nacionalidad
 * @property string $celular
 * @property string $domiciolio
 * @property string $ciudad
 * @property string $id_categoria
 * @property string $nombre_equipo
 * @property string $contacto_emergencia
 * @property string $nombre_apellido_contacto_emergencia
 * @property string $foto
 */
class Inscripcion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inscripcions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'primer_y_segundo_nombre',
        'primer_y_segundo_apellido',
        'fechanac',
        'email',
        'ci',
        'sexo',
        'grupo_sanguineo',
        'nacionalidad',
        'celular',
        'domiciolio',
        'ciudad',
        'id_categoria',
        'nombre_equipo',
        'contacto_emergencia',
        'nombre_apellido_contacto_emergencia',
        'foto',
        'departamento',
        'region',
        'estado',
        'monto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'primer_y_segundo_nombre' => 'string',
        'primer_y_segundo_apellido' => 'string',
        'fechanac' => 'string',
        'email' => 'string',
        'ci' => 'string',
        'sexo' => 'string',
        'grupo_sanguineo' => 'string',
        'nacionalidad' => 'string',
        'celular' => 'string',
        'domiciolio' => 'string',
        'ciudad' => 'string',
        'id_categoria' => 'string',
        'nombre_equipo' => 'string',
        'contacto_emergencia' => 'string',
        'nombre_apellido_contacto_emergencia' => 'string',
        'foto' => 'string',
        'departamento' => 'string',
        'region' => 'string',
        'estado' => 'string',
        'monto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'primer_y_segundo_nombre' => 'required',
        'primer_y_segundo_apellido' => 'required',
        'fechanac' => 'required',
        'ci' => 'required',
        'sexo' => 'required',
        'grupo_sanguineo' => 'required',
        'nacionalidad' => 'required',
        'celular' => 'required',
        'domiciolio' => 'required',
        'ciudad' => 'required',
        'id_categoria' => 'required',
        'nombre_equipo' => 'required',
        'contacto_emergencia' => 'required',
        'nombre_apellido_contacto_emergencia' => 'required',
        'email' => 'required',
        'foto' => 'required',
        'departamento' => 'required'
    ];

      public function categoria (){
     return $this-> belongsTo('App\Models\Categoria','id_categoria');

    }
}
