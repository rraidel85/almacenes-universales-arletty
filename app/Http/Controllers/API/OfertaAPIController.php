<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOfertaAPIRequest;
use App\Http\Requests\API\UpdateOfertaAPIRequest;
use App\Models\Oferta;
use App\Repositories\OfertaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OfertaController
 * @package App\Http\Controllers\API
 */

class OfertaAPIController extends AppBaseController
{
    /** @var  OfertaRepository */
    private $ofertaRepository;

    public function __construct(OfertaRepository $ofertaRepo)
    {
        $this->ofertaRepository = $ofertaRepo;
    }

    /**
     * Display a listing of the Oferta.
     * GET|HEAD /ofertas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ofertas = $this->ofertaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ofertas->toArray(), 'Ofertas retrieved successfully');
    }

    /**
     * Store a newly created Oferta in storage.
     * POST /ofertas
     *
     * @param CreateOfertaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOfertaAPIRequest $request)
    {
        $input = $request->all();

        $oferta = $this->ofertaRepository->create($input);

        return $this->sendResponse($oferta->toArray(), 'Oferta saved successfully');
    }

    /**
     * Display the specified Oferta.
     * GET|HEAD /ofertas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Oferta $oferta */
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            return $this->sendError('Oferta not found');
        }

        return $this->sendResponse($oferta->toArray(), 'Oferta retrieved successfully');
    }

    /**
     * Update the specified Oferta in storage.
     * PUT/PATCH /ofertas/{id}
     *
     * @param int $id
     * @param UpdateOfertaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfertaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Oferta $oferta */
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            return $this->sendError('Oferta not found');
        }

        $oferta = $this->ofertaRepository->update($input, $id);

        return $this->sendResponse($oferta->toArray(), 'Oferta updated successfully');
    }

    /**
     * Remove the specified Oferta from storage.
     * DELETE /ofertas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Oferta $oferta */
        $oferta = $this->ofertaRepository->find($id);

        if (empty($oferta)) {
            return $this->sendError('Oferta not found');
        }

        $oferta->delete();

        return $this->sendSuccess('Oferta deleted successfully');
    }
}
