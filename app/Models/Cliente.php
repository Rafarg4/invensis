<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cliente
 * @package App\Models
 * @version September 23, 2024, 7:46 pm -04
 *
 * @property string $nombre
 * @property string $apellido
 * @property string $ci_numero
 * @property string $direccion
 * @property string $telefono
 * @property string $ciudad
 * @property string $pais
 * @property string $mapa
 * @property string $lat
 * @property string $lang
 */
class Cliente extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'apellido',
        'ci_numero',
        'direccion',
        'telefono',
        'ciudad',
        'pais',
        'mapa',
        'lat',
        'lang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'ci_numero' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'ciudad' => 'string',
        'pais' => 'string',
        'mapa' => 'string',
        'lat' => 'string',
        'lang' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'ci_numero' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'ciudad' => 'requried',
        'pais' => 'required',
        'mapa' => 'tipo_cliente text text',
        'lat' => 'required',
        'lang' => 'required'
    ];

    
}
