<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCobroRequest;
use App\Http\Requests\UpdateCobroRequest;
use App\Repositories\CobroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CobroController extends AppBaseController
{
    /** @var CobroRepository $cobroRepository*/
    private $cobroRepository;

    public function __construct(CobroRepository $cobroRepo)
    {
        $this->cobroRepository = $cobroRepo;
    }

    /**
     * Display a listing of the Cobro.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cobros = $this->cobroRepository->all();

        return view('cobros.index')
            ->with('cobros', $cobros);
    }

    /**
     * Show the form for creating a new Cobro.
     *
     * @return Response
     */
    public function create()
    {
        return view('cobros.create');
    }

    /**
     * Store a newly created Cobro in storage.
     *
     * @param CreateCobroRequest $request
     *
     * @return Response
     */
    public function store(CreateCobroRequest $request)
    {
        $input = $request->all();

        $cobro = $this->cobroRepository->create($input);

        Flash::success('Cobro saved successfully.');

        return redirect(route('cobros.index'));
    }

    /**
     * Display the specified Cobro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro not found');

            return redirect(route('cobros.index'));
        }

        return view('cobros.show')->with('cobro', $cobro);
    }

    /**
     * Show the form for editing the specified Cobro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro not found');

            return redirect(route('cobros.index'));
        }

        return view('cobros.edit')->with('cobro', $cobro);
    }

    /**
     * Update the specified Cobro in storage.
     *
     * @param int $id
     * @param UpdateCobroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCobroRequest $request)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro not found');

            return redirect(route('cobros.index'));
        }

        $cobro = $this->cobroRepository->update($request->all(), $id);

        Flash::success('Cobro updated successfully.');

        return redirect(route('cobros.index'));
    }

    /**
     * Remove the specified Cobro from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro not found');

            return redirect(route('cobros.index'));
        }

        $this->cobroRepository->delete($id);

        Flash::success('Cobro deleted successfully.');

        return redirect(route('cobros.index'));
    }
}
