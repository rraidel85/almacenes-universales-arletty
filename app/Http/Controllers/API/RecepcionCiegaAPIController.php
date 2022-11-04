<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRecepcionCiegaAPIRequest;
use App\Http\Requests\API\UpdateRecepcionCiegaAPIRequest;
use App\Models\RecepcionCiega;
use App\Repositories\RecepcionCiegaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RecepcionCiegaController
 * @package App\Http\Controllers\API
 */

class RecepcionCiegaAPIController extends AppBaseController
{
    /** @var  RecepcionCiegaRepository */
    private $recepcionCiegaRepository;

    public function __construct(RecepcionCiegaRepository $recepcionCiegaRepo)
    {
        $this->recepcionCiegaRepository = $recepcionCiegaRepo;
    }

    /**
     * Display a listing of the RecepcionCiega.
     * GET|HEAD /recepcionCiegas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $recepcionCiegas = $this->recepcionCiegaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($recepcionCiegas->toArray(), 'Recepcion Ciegas retrieved successfully');
    }

    /**
     * Store a newly created RecepcionCiega in storage.
     * POST /recepcionCiegas
     *
     * @param CreateRecepcionCiegaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecepcionCiegaAPIRequest $request)
    {
        $input = $request->all();

        $recepcionCiega = $this->recepcionCiegaRepository->create($input);

        return $this->sendResponse($recepcionCiega->toArray(), 'Recepcion Ciega saved successfully');
    }

    /**
     * Display the specified RecepcionCiega.
     * GET|HEAD /recepcionCiegas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RecepcionCiega $recepcionCiega */
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            return $this->sendError('Recepcion Ciega not found');
        }

        return $this->sendResponse($recepcionCiega->toArray(), 'Recepcion Ciega retrieved successfully');
    }

    /**
     * Update the specified RecepcionCiega in storage.
     * PUT/PATCH /recepcionCiegas/{id}
     *
     * @param int $id
     * @param UpdateRecepcionCiegaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecepcionCiegaAPIRequest $request)
    {
        $input = $request->all();

        /** @var RecepcionCiega $recepcionCiega */
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            return $this->sendError('Recepcion Ciega not found');
        }

        $recepcionCiega = $this->recepcionCiegaRepository->update($input, $id);

        return $this->sendResponse($recepcionCiega->toArray(), 'RecepcionCiega updated successfully');
    }

    /**
     * Remove the specified RecepcionCiega from storage.
     * DELETE /recepcionCiegas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RecepcionCiega $recepcionCiega */
        $recepcionCiega = $this->recepcionCiegaRepository->find($id);

        if (empty($recepcionCiega)) {
            return $this->sendError('Recepcion Ciega not found');
        }

        $recepcionCiega->delete();

        return $this->sendSuccess('Recepcion Ciega deleted successfully');
    }
}
