<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use App\Repositories\PrestamosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cliente; // Importar el modelo Cliente
use Carbon\Carbon; // Importar Carbon para manejar fechas
use Flash;
use Response;

class PrestamosController extends AppBaseController
{
    /** @var PrestamosRepository $prestamosRepository */
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
        // Obtener la lista de clientes
        $clientes = Cliente::pluck('nombre', 'id');

        return view('prestamos.create', compact('clientes'));
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

        // Procesar el monto: eliminar comas y puntos para guardar un número limpio
        $input['monto'] = str_replace(['.', ','], '', $input['monto']);

        // Calcular los días de mora antes de guardar
        $fechaVencimiento = new \DateTime($input['fecha_vencimiento']);
        $fechaPago = new \DateTime($input['fecha_pago']);
        $diasMora = $fechaPago > $fechaVencimiento ? $fechaPago->diff($fechaVencimiento)->days : 0;

        // Guardar los valores procesados en el input
        $input['dias_mora'] = $diasMora;

        $prestamos = $this->prestamosRepository->create($input);

        Flash::success('Prestamo guardado correctamente.');

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
            Flash::error('Préstamo no encontrado.');

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
            Flash::error('Préstamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        // Obtener la lista de clientes para el dropdown en la edición
        $clientes = Cliente::pluck('nombre', 'id');

        return view('prestamos.edit', compact('prestamos', 'clientes'));
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
            Flash::error('Prestamo no encontrado');

            return redirect(route('prestamos.index'));
        }

        $input = $request->all();

        // Procesar el monto: eliminar comas y puntos
        $input['monto'] = str_replace(['.', ','], '', $input['monto']);

        // Calcular los días de mora antes de actualizar
        $fechaVencimiento = new \DateTime($input['fecha_vencimiento']);
        $fechaPago = new \DateTime($input['fecha_pago']);
        $diasMora = $fechaPago > $fechaVencimiento ? $fechaPago->diff($fechaVencimiento)->days : 0;

        $input['dias_mora'] = $diasMora;

        $prestamos = $this->prestamosRepository->update($input, $id);

        Flash::success('Prestamo actualizado correctamente.');

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
            Flash::error('Préstamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        $this->prestamosRepository->delete($id);

        Flash::success('Préstamo eliminado exitosamente.');

        return redirect(route('prestamos.index'));
    }
}
