<?php

namespace App\Repositories;

use App\Models\Factura;
use App\Repositories\BaseRepository;

/**
 * Class FacturaRepository
 * @package App\Repositories
 * @version October 27, 2022, 10:12 pm UTC
*/

class FacturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha'
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
        return Factura::class;
    }
}
