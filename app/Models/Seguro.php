<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Seguro
 * @package App\Models
 * @version January 20, 2023, 6:58 pm -03
 *
 * @property string $estado_civil
 * @property string $edad
 * @property string $usted_es
 * @property string $padece_enfermedad
 * @property string $especificar_enfermedad
 * @property string $presenta_defecto_fisico
 * @property string $especifique_defecto_fisico
 * @property string $estatura
 * @property string $peso
 * @property string $plan
 * @property string $nombre_apellido_fallecimiento_titular
 * @property string $parentesco_titular_beneficiario
 * @property string $ci_beneficiario
 * @property string $porcentaje_cesion
 * @property string $fechanac_beneficiario
 */
class Seguro extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'seguros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'estado_civil',
        'edad',
        'usted_es',
        'padece_enfermedad',
        'especificar_enfermedad',
        'presenta_defecto_fisico',
        'especifique_defecto_fisico',
        'estatura',
        'peso',
        'plan',
        'nombre_apellido_fallecimiento_titular',
        'parentesco_titular_beneficiario',
        'ci_beneficiario',
        'porcentaje_cesion',
        'fechanac_beneficiario',
        'id_inscripcion',
        'tipo_plan',
        'plan_con_deducible',
        'plan_sin_deducible',
        'id_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estado_civil' => 'string',
        'edad' => 'string',
        'usted_es' => 'string',
        'padece_enfermedad' => 'string',
        'especificar_enfermedad' => 'string',
        'presenta_defecto_fisico' => 'string',
        'especifique_defecto_fisico' => 'string',
        'estatura' => 'string',
        'peso' => 'string',
        'plan' => 'string',
        'nombre_apellido_fallecimiento_titular' => 'string',
        'parentesco_titular_beneficiario' => 'string',
        'ci_beneficiario' => 'string',
        'porcentaje_cesion' => 'string',
        'fechanac_beneficiario' => 'string',
        'id_inscripcion' => 'integer',
        'tipo_plan' => 'string',
         'plan_sin_deducible' => 'string',
          'plan_con_deducible' => 'string',
           'id_user' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estado_civil' => 'required',
        'edad' => 'required',
        'usted_es' => 'required',
        'padece_enfermedad' => 'required',
        'presenta_defecto_fisico' => 'required',
        'estatura' => 'required',
        'peso' => 'required',
        'tipo_plan' => 'required',
        'nombre_apellido_fallecimiento_titular' => 'required',
        'parentesco_titular_beneficiario' => 'required',
        'ci_beneficiario' => 'required',
        'porcentaje_cesion' => 'required',
        'fechanac_beneficiario' => 'required',
        'id_inscripcion' => 'required'
    ];

    public function inscripto (){
     return $this-> belongsTo('App\Models\Inscripcion','id_inscripcion');

    }
}
