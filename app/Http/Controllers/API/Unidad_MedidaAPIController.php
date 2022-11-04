<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUnidad_MedidaAPIRequest;
use App\Http\Requests\API\UpdateUnidad_MedidaAPIRequest;
use App\Models\Unidad_Medida;
use App\Repositories\Unidad_MedidaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Unidad_MedidaController
 * @package App\Http\Controllers\API
 */

class Unidad_MedidaAPIController extends AppBaseController
{
    /** @var  Unidad_MedidaRepository */
    private $unidadMedidaRepository;

    public function __construct(Unidad_MedidaRepository $unidadMedidaRepo)
    {
        $this->unidadMedidaRepository = $unidadMedidaRepo;
    }

    /**
     * Display a listing of the Unidad_Medida.
     * GET|HEAD /unidadMedidas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $unidadMedidas = $this->unidadMedidaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($unidadMedidas->toArray(), 'Unidad  Medidas retrieved successfully');
    }

    /**
     * Store a newly created Unidad_Medida in storage.
     * POST /unidadMedidas
     *
     * @param CreateUnidad_MedidaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidad_MedidaAPIRequest $request)
    {
        $input = $request->all();

        $unidadMedida = $this->unidadMedidaRepository->create($input);

        return $this->sendResponse($unidadMedida->toArray(), 'Unidad  Medida saved successfully');
    }

    /**
     * Display the specified Unidad_Medida.
     * GET|HEAD /unidadMedidas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Unidad_Medida $unidadMedida */
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            return $this->sendError('Unidad  Medida not found');
        }

        return $this->sendResponse($unidadMedida->toArray(), 'Unidad  Medida retrieved successfully');
    }

    /**
     * Update the specified Unidad_Medida in storage.
     * PUT/PATCH /unidadMedidas/{id}
     *
     * @param int $id
     * @param UpdateUnidad_MedidaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidad_MedidaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Unidad_Medida $unidadMedida */
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            return $this->sendError('Unidad  Medida not found');
        }

        $unidadMedida = $this->unidadMedidaRepository->update($input, $id);

        return $this->sendResponse($unidadMedida->toArray(), 'Unidad_Medida updated successfully');
    }

    /**
     * Remove the specified Unidad_Medida from storage.
     * DELETE /unidadMedidas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Unidad_Medida $unidadMedida */
        $unidadMedida = $this->unidadMedidaRepository->find($id);

        if (empty($unidadMedida)) {
            return $this->sendError('Unidad  Medida not found');
        }

        $unidadMedida->delete();

        return $this->sendSuccess('Unidad  Medida deleted successfully');
    }
}
