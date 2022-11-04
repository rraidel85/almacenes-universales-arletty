<?php

namespace App\Repositories;

use App\Models\StockProducto;
use App\Repositories\BaseRepository;

/**
 * Class StockProductoRepository
 * @package App\Repositories
 * @version October 18, 2022, 2:33 pm UTC
*/

class StockProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cantidad',
        'precio_compra',
        'fecha_entrada',
        'feha_produccion',
        'fecha_vencimiento'
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
        return StockProducto::class;
    }
}
