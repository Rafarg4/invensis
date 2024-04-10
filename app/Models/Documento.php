<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Documento
 * @package App\Models
 * @version January 2, 2023, 11:01 pm UTC
 *
 * @property string $archivo_pago
 * @property string $archivo_inscripcion
 */
class Documento extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'documentos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'archivo_inscripcion',
        'id_inscripcion',
        'archivo_seguro_medico',
        'estado',
        'archivo_certificado_medico',
        'archivo_copia_cedula',
        'id_user',
        'copia_cedula_fpc',
        'firma_registro_fpc'


    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    
        'archivo_inscripcion' => 'string',
        'id_inscripcion'=>'string',
        'archivo_seguro_medico'=>'string',
        'estado'=>'string',
        'archivo_certificado_medico'=>'string',
        'archivo_copia_cedula'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     public function inscripto (){
     return $this-> belongsTo('App\Models\Inscripcion','id_inscripcion');

    }
}
