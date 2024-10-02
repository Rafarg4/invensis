<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'ciudad' => 'required',  // Corregí el error aquí ("requried" a "required")
        'pais' => 'required',
        'lat' => 'required',
        'lang' => 'required'
    ];
}

