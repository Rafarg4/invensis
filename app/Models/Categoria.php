<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Categoria
 * @package App\Models
 * @version December 17, 2022, 11:45 am UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class Categoria extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'categorias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'id_modalidad',
        'edad_ini',
        'edad_fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'tipo_categoria' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
    ];

     public function incripcion (){
        return $this-> hasMany('App\Models\Inscripcion');
    }
    public function Atleta (){
        return $this-> hasMany('App\Models\Atleta');
    }
         public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }
    
}
