<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlmacenAPIRequest;
use App\Http\Requests\API\UpdateAlmacenAPIRequest;
use App\Models\Almacen;
use App\Repositories\AlmacenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AlmacenController
 * @package App\Http\Controllers\API
 */

class AlmacenAPIController extends AppBaseController
{
    /** @var  AlmacenRepository */
    private $almacenRepository;

    public function __construct(AlmacenRepository $almacenRepo)
    {
        $this->almacenRepository = $almacenRepo;
    }

    /**
     * Display a listing of the Almacen.
     * GET|HEAD /almacens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $almacens = $this->almacenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($almacens->toArray(), 'Almacens retrieved successfully');
    }

    /**
     * Store a newly created Almacen in storage.
     * POST /almacens
     *
     * @param CreateAlmacenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlmacenAPIRequest $request)
    {
        $input = $request->all();

        $almacen = $this->almacenRepository->create($input);

        return $this->sendResponse($almacen->toArray(), 'Almacen saved successfully');
    }

    /**
     * Display the specified Almacen.
     * GET|HEAD /almacens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Almacen $almacen */
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            return $this->sendError('Almacen not found');
        }

        return $this->sendResponse($almacen->toArray(), 'Almacen retrieved successfully');
    }

    /**
     * Update the specified Almacen in storage.
     * PUT/PATCH /almacens/{id}
     *
     * @param int $id
     * @param UpdateAlmacenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlmacenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Almacen $almacen */
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            return $this->sendError('Almacen not found');
        }

        $almacen = $this->almacenRepository->update($input, $id);

        return $this->sendResponse($almacen->toArray(), 'Almacen updated successfully');
    }

    /**
     * Remove the specified Almacen from storage.
     * DELETE /almacens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Almacen $almacen */
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            return $this->sendError('Almacen not found');
        }

        $almacen->delete();

        return $this->sendSuccess('Almacen deleted successfully');
    }
}
