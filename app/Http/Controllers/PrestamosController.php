<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use App\Repositories\PrestamosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Electrodomestico;
use Carbon\Carbon;
use Flash;
use Response;

class PrestamosController extends AppBaseController
{
    private $prestamosRepository;

    public function __construct(PrestamosRepository $prestamosRepo)
    {
        $this->prestamosRepository = $prestamosRepo;
    }

    public function index(Request $request)
    {
        $prestamos = $this->prestamosRepository->all();

        return view('prestamos.index')->with('prestamos', $prestamos);
    }

    public function create()
    {
        $clientes = Cliente::pluck('nombre', 'id');
        $electrodomesticos = Electrodomestico::pluck('nombre', 'id');

        return view('prestamos.create', compact('clientes', 'electrodomesticos'));
    }

    public function store(CreatePrestamosRequest $request)
    {
        $input = $request->all();

        // Limpiar y procesar el monto: eliminar puntos y comas para convertirlo en un número limpio
        $input['monto'] = str_replace(['.', ','], '', $input['monto']);
        $input['monto'] = (float) $input['monto']; 

        // Calcular días de mora e interés
        $fechaPago = Carbon::parse($input['fecha_pago']);
        $fechaVencimiento = Carbon::parse($input['fecha_vencimiento']);
        $diasMora = $fechaPago->diffInDays($fechaVencimiento, false);
        $input['dias_mora'] = $diasMora > 0 ? $diasMora : 0;

        // Calcular el interés según los días de mora
        $interes = $request->input('interes');
        $input['interes'] = (float) str_replace(',', '.', $interes);

        // Calcular el monto acumulado de mora
        $input['monto_mora_acumulado'] = $input['monto'] * ($input['interes'] / 100) * $input['dias_mora'];

        $prestamos = $this->prestamosRepository->create($input);

        Flash::success('Prestamo guardado correctamente.');

        return redirect(route('prestamos.index'));
    }

    public function edit($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Préstamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        // Convertir el monto, monto_mora_acumulado y el interés a float si es necesario antes de formatear
        $prestamos->monto = number_format((float) $prestamos->monto, 0, ',', '.');
        $prestamos->monto_mora_acumulado = isset($prestamos->monto_mora_acumulado) ? number_format((float) $prestamos->monto_mora_acumulado, 2, ',', '.') : '0.00';
        $prestamos->interes = isset($prestamos->interes) ? number_format((float) $prestamos->interes, 2, ',', '.') : '0.00';

        $clientes = Cliente::pluck('nombre', 'id');
        $electrodomesticos = Electrodomestico::pluck('nombre', 'id');

        return view('prestamos.edit', compact('prestamos', 'clientes', 'electrodomesticos'));
    }

    public function update($id, UpdatePrestamosRequest $request)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Prestamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        $input = $request->all();

        // Limpiar y procesar el monto: eliminar puntos y comas para convertirlo en un número limpio
        $input['monto'] = str_replace(['.', ','], '', $input['monto']);
        $input['monto'] = (float) $input['monto'];

        // Calcular días de mora e interés
        $fechaPago = Carbon::parse($input['fecha_pago']);
        $fechaVencimiento = Carbon::parse($input['fecha_vencimiento']);
        $diasMora = $fechaPago->diffInDays($fechaVencimiento, false);
        $input['dias_mora'] = $diasMora > 0 ? $diasMora : 0;

        // Calcular el interés según los días de mora
        $interes = $request->input('interes');
        $input['interes'] = (float) str_replace(',', '.', $interes);

        // Calcular el monto acumulado de mora
        $input['monto_mora_acumulado'] = $input['monto'] * ($input['interes'] / 100) * $input['dias_mora'];

        $prestamos = $this->prestamosRepository->update($input, $id);

        Flash::success('Prestamo actualizado correctamente.');

        return redirect(route('prestamos.index'));
    }

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







