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
    /** @var PrestamosRepository $prestamosRepository */
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
        $input['monto'] = (float) $input['monto']; // Asegurarse de que sea numérico

        // Guardar las fechas de vencimiento ingresadas por el usuario
        $input['fechas_vencimiento'] = json_encode($input['fechas_vencimiento']);

        // Calcular días de mora e interés
        $fechaPago = Carbon::parse($input['fecha_pago']);
        $fechasVencimientoArray = json_decode($input['fechas_vencimiento'], true);
        $fechaVencimiento = Carbon::parse(end($fechasVencimientoArray));
        $diasMora = $fechaPago->diffInDays($fechaVencimiento, false);
        $input['dias_mora'] = $diasMora > 0 ? $diasMora : 0;

        // Calcular el interés según los días de mora
        $interes = $request->input('interes'); // Obtener el interés proporcionado por el usuario
        $input['interes'] = (float) str_replace(',', '.', $interes); // Convertir a float para cálculos

        // Calcular el monto acumulado de mora
        $input['monto_mora_acumulado'] = $input['monto'] * ($input['interes'] / 100) * $input['dias_mora'];

        $prestamos = $this->prestamosRepository->create($input);

        Flash::success('Prestamo guardado correctamente.');

        return redirect(route('prestamos.index'));
    }

    public function show($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Préstamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        // Formatear el monto para mostrarlo correctamente en la vista
        $prestamos->monto = number_format($prestamos->monto, 0, ',', '.');

        return view('prestamos.show')->with('prestamos', $prestamos);
    }

    public function edit($id)
    {
        $prestamos = $this->prestamosRepository->find($id);

        if (empty($prestamos)) {
            Flash::error('Préstamo no encontrado.');

            return redirect(route('prestamos.index'));
        }

        // Convertir el monto y monto_mora_acumulado a float si es necesario antes de formatear
        $prestamos->monto = number_format((float) $prestamos->monto, 0, ',', '.');
        $prestamos->monto_mora_acumulado = isset($prestamos->monto_mora_acumulado) ? number_format((float) $prestamos->monto_mora_acumulado, 2, ',', '.') : '0.00';

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
        $input['monto'] = (float) $input['monto']; // Asegurarse de que sea numérico

        // Guardar las fechas de vencimiento ingresadas por el usuario
        $input['fechas_vencimiento'] = json_encode($input['fechas_vencimiento']);

        // Calcular días de mora e interés
        $fechaPago = Carbon::parse($input['fecha_pago']);
        $fechasVencimientoArray = json_decode($input['fechas_vencimiento'], true);
        $fechaVencimiento = Carbon::parse(end($fechasVencimientoArray));
        $diasMora = $fechaPago->diffInDays($fechaVencimiento, false);
        $input['dias_mora'] = $diasMora > 0 ? $diasMora : 0;

        // Calcular el interés según los días de mora
        $interes = $request->input('interes'); // Obtener el interés proporcionado por el usuario
        $input['interes'] = (float) str_replace(',', '.', $interes); // Convertir a float para cálculos

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





