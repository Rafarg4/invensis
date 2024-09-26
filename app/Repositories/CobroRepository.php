<?php

namespace App\Repositories;

use App\Models\Cobro;
use App\Repositories\BaseRepository;

/**
 * Class CobroRepository
 * @package App\Repositories
 * @version September 23, 2024, 7:50 pm -04
*/

class CobroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_cliente',
        'monto_cobro',
        'fecha_cobro'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cobro::class;
    }
}
