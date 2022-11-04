<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFacturaAPIRequest;
use App\Http\Requests\API\UpdateFacturaAPIRequest;
use App\Models\Factura;
use App\Repositories\FacturaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FacturaController
 * @package App\Http\Controllers\API
 */

class FacturaAPIController extends AppBaseController
{
    /** @var  FacturaRepository */
    private $facturaRepository;

    public function __construct(FacturaRepository $facturaRepo)
    {
        $this->facturaRepository = $facturaRepo;
    }

    /**
     * Display a listing of the Factura.
     * GET|HEAD /facturas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $facturas = $this->facturaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($facturas->toArray(), 'Facturas retrieved successfully');
    }

    /**
     * Store a newly created Factura in storage.
     * POST /facturas
     *
     * @param CreateFacturaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturaAPIRequest $request)
    {
        $input = $request->all();

        $factura = $this->facturaRepository->create($input);

        return $this->sendResponse($factura->toArray(), 'Factura saved successfully');
    }

    /**
     * Display the specified Factura.
     * GET|HEAD /facturas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Factura $factura */
        $factura = $this->facturaRepository->find($id);

        if (empty($factura)) {
            return $this->sendError('Factura not found');
        }

        return $this->sendResponse($factura->toArray(), 'Factura retrieved successfully');
    }

    /**
     * Update the specified Factura in storage.
     * PUT/PATCH /facturas/{id}
     *
     * @param int $id
     * @param UpdateFacturaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Factura $factura */
        $factura = $this->facturaRepository->find($id);

        if (empty($factura)) {
            return $this->sendError('Factura not found');
        }

        $factura = $this->facturaRepository->update($input, $id);

        return $this->sendResponse($factura->toArray(), 'Factura updated successfully');
    }

    /**
     * Remove the specified Factura from storage.
     * DELETE /facturas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Factura $factura */
        $factura = $this->facturaRepository->find($id);

        if (empty($factura)) {
            return $this->sendError('Factura not found');
        }

        $factura->delete();

        return $this->sendSuccess('Factura deleted successfully');
    }
}
