<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProveedorAPIRequest;
use App\Http\Requests\API\UpdateProveedorAPIRequest;
use App\Models\Proveedor;
use App\Repositories\ProveedorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProveedorController
 * @package App\Http\Controllers\API
 */

class ProveedorAPIController extends AppBaseController
{
    /** @var  ProveedorRepository */
    private $proveedorRepository;

    public function __construct(ProveedorRepository $proveedorRepo)
    {
        $this->proveedorRepository = $proveedorRepo;
    }

    /**
     * Display a listing of the Proveedor.
     * GET|HEAD /proveedors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $proveedors = $this->proveedorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($proveedors->toArray(), 'Proveedors retrieved successfully');
    }

    /**
     * Store a newly created Proveedor in storage.
     * POST /proveedors
     *
     * @param CreateProveedorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProveedorAPIRequest $request)
    {
        $input = $request->all();

        $proveedor = $this->proveedorRepository->create($input);

        return $this->sendResponse($proveedor->toArray(), 'Proveedor saved successfully');
    }

    /**
     * Display the specified Proveedor.
     * GET|HEAD /proveedors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Proveedor $proveedor */
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            return $this->sendError('Proveedor not found');
        }

        return $this->sendResponse($proveedor->toArray(), 'Proveedor retrieved successfully');
    }

    /**
     * Update the specified Proveedor in storage.
     * PUT/PATCH /proveedors/{id}
     *
     * @param int $id
     * @param UpdateProveedorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProveedorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Proveedor $proveedor */
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            return $this->sendError('Proveedor not found');
        }

        $proveedor = $this->proveedorRepository->update($input, $id);

        return $this->sendResponse($proveedor->toArray(), 'Proveedor updated successfully');
    }

    /**
     * Remove the specified Proveedor from storage.
     * DELETE /proveedors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Proveedor $proveedor */
        $proveedor = $this->proveedorRepository->find($id);

        if (empty($proveedor)) {
            return $this->sendError('Proveedor not found');
        }

        $proveedor->delete();

        return $this->sendSuccess('Proveedor deleted successfully');
    }
}
