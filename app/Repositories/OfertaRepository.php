<?php

namespace App\Repositories;

use App\Models\Oferta;
use App\Repositories\BaseRepository;

/**
 * Class OfertaRepository
 * @package App\Repositories
 * @version October 27, 2022, 10:10 pm UTC
*/

class OfertaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'facturado'
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
        return Oferta::class;
    }
}
