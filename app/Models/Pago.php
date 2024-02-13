<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pago
 * @package App\Models
 * @version January 20, 2024, 10:56 pm -03
 *
 * @property string $tipo_pago
 * @property string $comprobante
 * @property string $fecha_pago
 * @property string $estado
 * @property string $observacion
 */
class Pago extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pagos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_tarifa',
        'id_inscripcion',
        'id_user',
        'comprobante',
        'estado',
        'observacion',
        'forma_pago'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_tarifa' => 'integer',
        'id_user',
        'comprobante' => 'string',
        'fecha_pago' => 'string',
        'estado' => 'string',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function tarifa (){
     return $this-> belongsTo('App\Models\Tarifa','id_tarifa');

    }
    public function usuario (){
     return $this-> belongsTo('App\Models\User','id_user');

    }
    public function inscripcion (){
     return $this-> belongsTo('App\Models\Inscripcion','id_inscripcion');

    }
    
}
