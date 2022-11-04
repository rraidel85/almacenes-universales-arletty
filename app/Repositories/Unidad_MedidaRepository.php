<?php

namespace App\Repositories;

use App\Models\Unidad_Medida;
use App\Repositories\BaseRepository;

/**
 * Class Unidad_MedidaRepository
 * @package App\Repositories
 * @version October 25, 2022, 3:17 pm UTC
*/

class Unidad_MedidaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'simbolo',
        'equivalencia'
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
        return Unidad_Medida::class;
    }
}
