<?php

namespace App\Repositories;

use App\Models\Recepción_Ciega;
use App\Repositories\BaseRepository;

/**
 * Class Recepción_CiegaRepository
 * @package App\Repositories
 * @version October 18, 2022, 1:59 pm UTC
*/

class Recepción_CiegaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'factura',
        'transportador'
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
        return Recepción_Ciega::class;
    }
}
