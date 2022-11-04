<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlmacenRequest;
use App\Http\Requests\UpdateAlmacenRequest;
use App\Repositories\AlmacenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AlmacenController extends AppBaseController
{
    /** @var AlmacenRepository $almacenRepository*/
    private $almacenRepository;

    public function __construct(AlmacenRepository $almacenRepo)
    {
        $this->almacenRepository = $almacenRepo;
    }

    /**
     * Display a listing of the Almacen.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $almacens = $this->almacenRepository->paginate(10);

        return view('almacens.index')
            ->with('almacens', $almacens);
    }

    /**
     * Show the form for creating a new Almacen.
     *
     * @return Response
     */
    public function create()
    {
        return view('almacens.create');
    }

    /**
     * Store a newly created Almacen in storage.
     *
     * @param CreateAlmacenRequest $request
     *
     * @return Response
     */
    public function store(CreateAlmacenRequest $request)
    {
        $input = $request->all();

        $almacen = $this->almacenRepository->create($input);

        Flash::success('Almacén se guardó corectamente.');

        return redirect(route('almacens.index'));
    }

    /**
     * Display the specified Almacen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            Flash::error('Almacen not found');

            return redirect(route('almacens.index'));
        }

        return view('almacens.show')->with('almacen', $almacen);
    }

    /**
     * Show the form for editing the specified Almacen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            Flash::error('Almacen not found');

            return redirect(route('almacens.index'));
        }

        return view('almacens.edit')->with('almacen', $almacen);
    }

    /**
     * Update the specified Almacen in storage.
     *
     * @param int $id
     * @param UpdateAlmacenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlmacenRequest $request)
    {
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            Flash::error('Almacen not found');

            return redirect(route('almacens.index'));
        }

        $almacen = $this->almacenRepository->update($request->all(), $id);

        Flash::success('Almacén se editó corectamente.');

        return redirect(route('almacens.index'));
    }

    /**
     * Remove the specified Almacen from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $almacen = $this->almacenRepository->find($id);

        if (empty($almacen)) {
            Flash::error('Almacen not found');

            return redirect(route('almacens.index'));
        }

        $this->almacenRepository->delete($id);

        Flash::success('Almacén se eliminó corectamente.');

        return redirect(route('almacens.index'));
    }
}
