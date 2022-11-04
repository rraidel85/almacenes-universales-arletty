<?php

namespace App\Repositories;

use App\Models\Almacen;
use App\Repositories\BaseRepository;

/**
 * Class AlmacenRepository
 * @package App\Repositories
 * @version October 18, 2022, 2:03 pm UTC
*/

class AlmacenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Almacen::class;
    }
}
