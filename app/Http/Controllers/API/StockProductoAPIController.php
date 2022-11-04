<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockProductoAPIRequest;
use App\Http\Requests\API\UpdateStockProductoAPIRequest;
use App\Models\StockProducto;
use App\Repositories\StockProductoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StockProductoController
 * @package App\Http\Controllers\API
 */

class StockProductoAPIController extends AppBaseController
{
    /** @var  StockProductoRepository */
    private $stockProductoRepository;

    public function __construct(StockProductoRepository $stockProductoRepo)
    {
        $this->stockProductoRepository = $stockProductoRepo;
    }

    /**
     * Display a listing of the StockProducto.
     * GET|HEAD /stockProductos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stockProductos = $this->stockProductoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stockProductos->toArray(), 'Stock Productos retrieved successfully');
    }

    /**
     * Store a newly created StockProducto in storage.
     * POST /stockProductos
     *
     * @param CreateStockProductoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStockProductoAPIRequest $request)
    {
        $input = $request->all();

        $stockProducto = $this->stockProductoRepository->create($input);

        return $this->sendResponse($stockProducto->toArray(), 'Stock Producto saved successfully');
    }

    /**
     * Display the specified StockProducto.
     * GET|HEAD /stockProductos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StockProducto $stockProducto */
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            return $this->sendError('Stock Producto not found');
        }

        return $this->sendResponse($stockProducto->toArray(), 'Stock Producto retrieved successfully');
    }

    /**
     * Update the specified StockProducto in storage.
     * PUT/PATCH /stockProductos/{id}
     *
     * @param int $id
     * @param UpdateStockProductoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockProductoAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockProducto $stockProducto */
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            return $this->sendError('Stock Producto not found');
        }

        $stockProducto = $this->stockProductoRepository->update($input, $id);

        return $this->sendResponse($stockProducto->toArray(), 'StockProducto updated successfully');
    }

    /**
     * Remove the specified StockProducto from storage.
     * DELETE /stockProductos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StockProducto $stockProducto */
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            return $this->sendError('Stock Producto not found');
        }

        $stockProducto->delete();

        return $this->sendSuccess('Stock Producto deleted successfully');
    }
}
