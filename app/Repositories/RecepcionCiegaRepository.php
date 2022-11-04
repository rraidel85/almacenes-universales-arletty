<?php

namespace App\Repositories;

use App\Models\RecepcionCiega;
use App\Repositories\BaseRepository;

/**
 * Class RecepcionCiegaRepository
 * @package App\Repositories
 * @version October 18, 2022, 2:41 pm UTC
*/

class RecepcionCiegaRepository extends BaseRepository
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
        return RecepcionCiega::class;
    }
}
