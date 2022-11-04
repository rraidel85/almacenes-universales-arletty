<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockProductoRequest;
use App\Http\Requests\UpdateStockProductoRequest;
use App\Repositories\StockProductoRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Area;
use App\Models\Producto;
use App\Models\RecepcionCiega;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockProductoController extends AppBaseController
{
    /** @var StockProductoRepository $stockProductoRepository*/
    private $stockProductoRepository;

    public function __construct(StockProductoRepository $stockProductoRepo)
    {
        $this->stockProductoRepository = $stockProductoRepo;
    }

    /**
     * Display a listing of the StockProducto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockProductos = $this->stockProductoRepository->paginate(10);

        return view('stock_productos.index')
            ->with('stockProductos', $stockProductos);
    }

    /**
     * Show the form for creating a new StockProducto.
     *
     * @return Response
     */
    public function create()
    {
        $productos = Producto:: pluck( 'nombre', 'id');
        $recepcin_ciega= RecepcionCiega:: pluck('numerofactura', 'id');
        $area= Area:: pluck('nombre', 'id');

        return view('stock_productos.create', compact('productos','recepcin_ciega','area'));
    }

    /**
     * Store a newly created StockProducto in storage.
     *
     * @param CreateStockProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateStockProductoRequest $request)
    {
        $input = $request->all();
        //dd($input);
        $stockProducto = $this->stockProductoRepository->create($input);

        Flash::success('Stock Producto se ha guardado corectamente.');

        return redirect(route('stockProductos.index'));
    }

    /**
     * Display the specified StockProducto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            Flash::error('Stock Producto not found');

            return redirect(route('stockProductos.index'));
        }

        return view('stock_productos.show')->with('stockProducto', $stockProducto);
    }

    /**
     * Show the form for editing the specified StockProducto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            Flash::error('Stock Producto not found');

            return redirect(route('stockProductos.index'));
        }

        $recepcin_ciega= RecepcionCiega:: pluck('numerofactura', 'id');

        $area= Area:: pluck('nombre', 'id');

        $productos = Producto:: pluck( 'nombre', 'id');

        return view('stock_productos.edit', compact('stockProducto','productos','recepcin_ciega', 'area'));
    }

    /**
     * Update the specified StockProducto in storage.
     *
     * @param int $id
     * @param UpdateStockProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockProductoRequest $request)
    {
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            Flash::error('Stock Producto not found');

            return redirect(route('stockProductos.index'));
        }

        $stockProducto = $this->stockProductoRepository->update($request->all(), $id);

        Flash::success('Stock Producto se ha editado corectamente.');

        return redirect(route('stockProductos.index'));
    }

    /**
     * Remove the specified StockProducto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockProducto = $this->stockProductoRepository->find($id);

        if (empty($stockProducto)) {
            Flash::error('Stock Producto not found');

            return redirect(route('stockProductos.index'));
        }

        $this->stockProductoRepository->delete($id);

        Flash::success('Stock Producto se ha eliminado corectamente.');

        return redirect(route('stockProductos.index'));
    }
}
