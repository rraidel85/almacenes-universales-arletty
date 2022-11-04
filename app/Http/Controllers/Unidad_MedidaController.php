<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnidad_MedidaRequest;
use App\Http\Requests\UpdateUnidad_MedidaRequest;
use App\Repositories\Unidad_MedidaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Unidad_MedidaController extends AppBaseController
{
    /** @var Unidad_MedidaRepository $unidadMedidaRepository*/
    private $unidadMedidaRepository;

    public function __construct(Unidad_MedidaRepository $unidadMedidaRepo)
    {
        $this->unidadMedidaRepository = $unidadMedidaRepo;
    }

    /**
     * Display a listing of the Unidad_Medida.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $unidadMedidas = $this->unidadMedidaRepository->paginate(10);

        return view('unidad__medidas.index')
            ->with('unidadMedidas', $unidadMedidas);
    }

    /**
     * Show the form for creating a new Unidad_Medida.
     *
     * @return Response
     */
    public function create()
    {
        return view('unidad__medidas.create');
    }

    /**
     * Store a newly created Unidad_Medida in storage.
     *
     * @param CreateUnidad_MedidaRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidad_MedidaRequest $request)
    {
        $input = $request->all();

        $unidadMedida = $this->unidadMedidaRepository->create($input);

        Flash::success('Unidad  Medida se ha guardado corectamente');

        return redirect(route('unidadMedidas.index'));
    }

    /**
     * Display the specified Unidad_Medida.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            Flash::error('Unidad  Medida not found');

            return redirect(route('unidadMedidas.index'));
        }

        return view('unidad__medidas.show')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Show the form for editing the specified Unidad_Medida.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            Flash::error('Unidad  Medida not found');

            return redirect(route('unidadMedidas.index'));
        }

        return view('unidad__medidas.edit')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Update the specified Unidad_Medida in storage.
     *
     * @param int $id
     * @param UpdateUnidad_MedidaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidad_MedidaRequest $request)
    {
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            Flash::error('Unidad  Medida not found');

            return redirect(route('unidadMedidas.index'));
        }

        $unidadMedida = $this->unidadMedidaRepository->update($request->all(), $id);

        Flash::success('Unidad  Medida se ha editado corectamente.');

        return redirect(route('unidadMedidas.index'));
    }

    /**
     * Remove the specified Unidad_Medida from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            Flash::error('Unidad  Medida not found');

            return redirect(route('unidadMedidas.index'));
        }

        $this->unidadMedidaRepository->delete($id);

        Flash::success('Unidad  Medida se eliminó corectamente.');

        return redirect(route('unidadMedidas.index'));
    }
}
