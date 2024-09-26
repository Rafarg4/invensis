<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use App\Repositories\PrestamosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PrestamosController extends AppBaseController
{
    /** @var PrestamosRepository $prestamosRepository*/
    private $prestamosRepository;

    public function __construct(PrestamosRepository $prestamosRepo)
    {
        $this->prestamosRepository = $prestamosRepo;
    }

    /**
     * Display a listing of the Prestamos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $prestamos = $this->prestamosRepository->all();

        return view('prestamos.index')
            ->with('prestamos', $prestamos);
    }

    /**
     * Show the form for creating a new Prestamos.
     *
     * @return Response
     */
    public function create()
    {
        return view('prestamos.create');
    }

    /**
     * Store a newly created Prestamos in storage.
     *
     * @param CreatePrestamosRequest $request
     *
     * @return Response
     */
    public function store(CreatePrestamosRequest $request)
    {
        $input = $request->all();

        $prestamos = $this->prestamosRepository->create($input);

        Flash::success('Prestamos saved successfully.');

        return redirect(route('prestamos.index'));
    }

    /**
     * Display the specified Prestamos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Prestamos not found');

            return redirect(route('prestamos.index'));
        }

        return view('prestamos.show')->with('prestamos', $prestamos);
    }

    /**
     * Show the form for editing the specified Prestamos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Prestamos not found');

            return redirect(route('prestamos.index'));
        }

        return view('prestamos.edit')->with('prestamos', $prestamos);
    }

    /**
     * Update the specified Prestamos in storage.
     *
     * @param int $id
     * @param UpdatePrestamosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrestamosRequest $request)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Prestamos not found');

            return redirect(route('prestamos.index'));
        }

        $prestamos = $this->prestamosRepository->update($request->all(), $id);

        Flash::success('Prestamos updated successfully.');

        return redirect(route('prestamos.index'));
    }

    /**
     * Remove the specified Prestamos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Prestamos not found');

            return redirect(route('prestamos.index'));
        }

        $this->prestamosRepository->delete($id);

        Flash::success('Prestamos deleted successfully.');

        return redirect(route('prestamos.index'));
    }
}
