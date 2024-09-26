<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateElectrodomesticoRequest;
use App\Http\Requests\UpdateElectrodomesticoRequest;
use App\Repositories\ElectrodomesticoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ElectrodomesticoController extends AppBaseController
{
    /** @var ElectrodomesticoRepository $electrodomesticoRepository*/
    private $electrodomesticoRepository;

    public function __construct(ElectrodomesticoRepository $electrodomesticoRepo)
    {
        $this->electrodomesticoRepository = $electrodomesticoRepo;
    }

    /**
     * Display a listing of the Electrodomestico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $electrodomesticos = $this->electrodomesticoRepository->all();

        return view('electrodomesticos.index')
            ->with('electrodomesticos', $electrodomesticos);
    }

    /**
     * Show the form for creating a new Electrodomestico.
     *
     * @return Response
     */
    public function create()
    {
        return view('electrodomesticos.create');
    }

    /**
     * Store a newly created Electrodomestico in storage.
     *
     * @param CreateElectrodomesticoRequest $request
     *
     * @return Response
     */
    public function store(CreateElectrodomesticoRequest $request)
    {
        $input = $request->all();

        $electrodomestico = $this->electrodomesticoRepository->create($input);

        Flash::success('Electrodomestico saved successfully.');

        return redirect(route('electrodomesticos.index'));
    }

    /**
     * Display the specified Electrodomestico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $electrodomestico = $this->electrodomesticoRepository->find($id);

        if (empty($electrodomestico)) {
            Flash::error('Electrodomestico not found');

            return redirect(route('electrodomesticos.index'));
        }

        return view('electrodomesticos.show')->with('electrodomestico', $electrodomestico);
    }

    /**
     * Show the form for editing the specified Electrodomestico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $electrodomestico = $this->electrodomesticoRepository->find($id);

        if (empty($electrodomestico)) {
            Flash::error('Electrodomestico not found');

            return redirect(route('electrodomesticos.index'));
        }

        return view('electrodomesticos.edit')->with('electrodomestico', $electrodomestico);
    }

    /**
     * Update the specified Electrodomestico in storage.
     *
     * @param int $id
     * @param UpdateElectrodomesticoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElectrodomesticoRequest $request)
    {
        $electrodomestico = $this->electrodomesticoRepository->find($id);

        if (empty($electrodomestico)) {
            Flash::error('Electrodomestico not found');

            return redirect(route('electrodomesticos.index'));
        }

        $electrodomestico = $this->electrodomesticoRepository->update($request->all(), $id);

        Flash::success('Electrodomestico updated successfully.');

        return redirect(route('electrodomesticos.index'));
    }

    /**
     * Remove the specified Electrodomestico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $electrodomestico = $this->electrodomesticoRepository->find($id);

        if (empty($electrodomestico)) {
            Flash::error('Electrodomestico not found');

            return redirect(route('electrodomesticos.index'));
        }

        $this->electrodomesticoRepository->delete($id);

        Flash::success('Electrodomestico deleted successfully.');

        return redirect(route('electrodomesticos.index'));
    }
}
