<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecepcionCiegaRequest;
use App\Http\Requests\UpdateRecepcionCiegaRequest;
use App\Repositories\RecepcionCiegaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Flash;
use Response;

class RecepcionCiegaController extends AppBaseController
{
    /** @var RecepcionCiegaRepository $recepcionCiegaRepository*/
    private $recepcionCiegaRepository;

    public function __construct(RecepcionCiegaRepository $recepcionCiegaRepo)
    {
        $this->recepcionCiegaRepository = $recepcionCiegaRepo;
    }

    /**
     * Display a listing of the RecepcionCiega.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $recepcionCiegas = $this->recepcionCiegaRepository->paginate(10);

        return view('recepcion_ciegas.index')
            ->with('recepcionCiegas', $recepcionCiegas);
    }

    /**
     * Show the form for creating a new RecepcionCiega.
     *
     * @return Response
     */
    public function create()
    {
        $proveedores = Proveedor::pluck('nombre', 'id');
        return view('recepcion_ciegas.create', compact('proveedores'));


    }

    /**
     * Store a newly created RecepcionCiega in storage.
     *
     * @param CreateRecepcionCiegaRequest $request
     *
     * @return Response
     */
    public function store(CreateRecepcionCiegaRequest $request)
    {
        $input = $request->all();

        $recepcionCiega = $this->recepcionCiegaRepository->create($input);

        Flash::success('Recepcion Ciega se guardó corectamente.');

        return redirect(route('recepcionCiegas.index'));
    }

    /**
     * Display the specified RecepcionCiega.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            Flash::error('Recepcion Ciega not found');

            return redirect(route('recepcionCiegas.index'));
        }

        return view('recepcion_ciegas.show')->with('recepcionCiega', $recepcionCiega);
    }

    /**
     * Show the form for editing the specified RecepcionCiega.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            Flash::error('Recepcion Ciega not found');

            return redirect(route('recepcionCiegas.index'));
        }
        
        $proveedores = Proveedor::pluck('nombre', 'id');
        return view('recepcion_ciegas.edit',compact('recepcionCiega','proveedores'));
    }

    /**
     * Update the specified RecepcionCiega in storage.
     *
     * @param int $id
     * @param UpdateRecepcionCiegaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecepcionCiegaRequest $request)
    {
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            Flash::error('Recepcion Ciega not found');

            return redirect(route('recepcionCiegas.index'));
        }

        $recepcionCiega = $this->recepcionCiegaRepository->update($request->all(), $id);

        Flash::success('Recepcion Ciega se editó correctamente.');

        return redirect(route('recepcionCiegas.index'));
    }

    /**
     * Remove the specified RecepcionCiega from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            Flash::error('Recepcion Ciega not found');

            return redirect(route('recepcionCiegas.index'));
        }

        $this->recepcionCiegaRepository->delete($id);

        Flash::success('Recepcion Ciega eliminó correctamente.');

        return redirect(route('recepcionCiegas.index'));
    }
}
