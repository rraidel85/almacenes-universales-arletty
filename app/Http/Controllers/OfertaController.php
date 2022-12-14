<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfertaRequest;
use App\Http\Requests\UpdateOfertaRequest;
use App\Repositories\OfertaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Cliente;
use App\Models\StockProducto;
use Illuminate\Http\Request;
use Flash;
use Response;

class OfertaController extends AppBaseController
{
    /** @var OfertaRepository $ofertaRepository*/
    private $ofertaRepository;

    public function __construct(OfertaRepository $ofertaRepo)
    {
        $this->ofertaRepository = $ofertaRepo;
    }

    /**
     * Display a listing of the Oferta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ofertas = $this->ofertaRepository->paginate(10);

        return view('ofertas.index')
            ->with('ofertas', $ofertas);
    }

    /**
     * Show the form for creating a new Oferta.
     *
     * @return Response
     */
    public function create()
    {
        $stocks = StockProducto::all();
        return view('ofertas.create', compact('stocks'));
    }

    /**
     * Store a newly created Oferta in storage.
     *
     * @param CreateOfertaRequest $request
     *
     * @return Response
     */
    public function store(CreateOfertaRequest $request)
    {
        $input = $request->all();

        $oferta = $this->ofertaRepository->create($input);

        $oferta->stock_producto()->attach($request->stocks);

        Flash::success('Oferta se ha guardado corectamente.');

        return redirect(route('ofertas.index'));
    }

    /**
     * Display the specified Oferta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            Flash::error('Oferta not found');

            return redirect(route('ofertas.index'));
        }

        return view('ofertas.show')->with('oferta', $oferta);
    }

    /**
     * Show the form for editing the specified Oferta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            Flash::error('Oferta not found');

            return redirect(route('ofertas.index'));
        }

        $stocks = StockProducto::all();

        $stocks_seleccionados = $oferta->stock_producto->pluck('id');

        return view('ofertas.edit', compact('oferta', 'stocks', 'stocks_seleccionados'));
    }

    /**
     * Update the specified Oferta in storage.
     *
     * @param int $id
     * @param UpdateOfertaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfertaRequest $request)
    {
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            Flash::error('Oferta not found');

            return redirect(route('ofertas.index'));
        }

        $oferta = $this->ofertaRepository->update($request->all(), $id);

        $oferta->stock_producto()->sync($request->stocks);

        Flash::success('Oferta se ha editado corectamente.');

        return redirect(route('ofertas.index'));
    }

    /**
     * Remove the specified Oferta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            Flash::error('Oferta not found');

            return redirect(route('ofertas.index'));
        }

        $this->ofertaRepository->delete($id);

        Flash::success('Oferta se ha eliminado corectamente.');

        return redirect(route('ofertas.index'));
    }
}
