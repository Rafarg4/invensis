<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Modalidad
 * @package App\Models
 * @version June 4, 2024, 6:32 pm -04
 *
 * @property string $nombre
 */
class Modalidad extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'modalidads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];
    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'id_modalidad');
    }

    
}
