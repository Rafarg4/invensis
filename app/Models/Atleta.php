<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Atleta
 * @package App\Models
 * @version January 23, 2024, 9:17 pm -03
 *
 * @property string $nombres
 * @property string $apellidos
 * @property string $ci
 * @property string $sexo
 * @property string $celular
 * @property string $ciudad
 * @property string $departamento
 * @property string $categoria
 * @property string $tipo_categoria
 * @property string $nombre_equipo
 * @property string $federacion_id
 * @property string $uci_id
 * @property string $modo
 * @property string $id_user
 */
class Atleta extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'atletas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombres',
        'apellidos',
        'ci',
        'sexo',
        'celular',
        'ciudad',
        'departamento',
        'id_categoria',
        'tipo_categoria',
        'nombre_equipo',
        'federacion_id',
        'uci_id',
        'modo',
        'id_user',
        'id_evento',
        'estado',
        'id_inscripcion'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'ci' => 'string',
        'sexo' => 'string',
        'celular' => 'string',
        'ciudad' => 'string',
        'departamento' => 'string',
        'categoria' => 'string',
        'tipo_categoria' => 'string',
        'nombre_equipo' => 'string',
        'federacion_id' => 'string',
        'uci_id' => 'string',
        'modo' => 'string',
        'id_user' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
    ];
    public function evento (){
     return $this-> belongsTo('App\Models\Evento','id_evento');

    }
    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'id_categoria');
}
}
