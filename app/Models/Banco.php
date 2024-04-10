<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Banco
 * @package App\Models
 * @version March 18, 2024, 6:51 pm -03
 *
 * @property string $nombre_cuenta
 * @property string $ci_ruc
 * @property string $banco
 */
class Banco extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bancos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre_cuenta',
        'ci_ruc',
        'banco'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_cuenta' => 'string',
        'ci_ruc' => 'string',
        'banco' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
