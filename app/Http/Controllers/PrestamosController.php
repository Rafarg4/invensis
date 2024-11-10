<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamosRequest;
use App\Http\Requests\UpdatePrestamosRequest;
use App\Repositories\PrestamosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestamos;
use App\Models\Electrodomestico;
use App\Models\Saldo;
use Carbon\Carbon;
use Flash;
use Response;
use PDF;
class PrestamosController extends AppBaseController
{
    private $prestamosRepository;

    public function __construct(PrestamosRepository $prestamosRepo)
    {
        $this->prestamosRepository = $prestamosRepo;
    }

    // Método para listar todos los préstamos con búsqueda
    public function index(Request $request)
    {
        $prestamos = $this->prestamosRepository->allQuery();

        if ($request->filled('buscar_general')) {
            $prestamos->where(function ($query) use ($request) {
                $query->where('numero_prestamo', $request->buscar_general)
                      ->orWhere('id_cliente', 'like', '%' . $request->buscar_general . '%')
                      ->orWhereHas('cliente', function ($q) use ($request) {
                          $q->where('ci', 'like', '%' . $request->buscar_general . '%');
                      });
            });
        }

        $prestamos = $prestamos->get();

        return view('prestamos.index')->with('prestamos', $prestamos);
    }

    // Método para mostrar los detalles de un préstamo con cuotas pendientes
    public function show($id)
    {
        // Cargar el préstamo con la relación `saldos` usando el modelo `Prestamos` directamente
        $prestamo = Prestamos::with('saldos')->find($id);

        if (empty($prestamo)) {
            Flash::error('Préstamo no encontrado.');
            return redirect(route('prestamos.index'));
        }

        // Obtener cuotas pendientes desde la relación `saldos` del préstamo
        $cuotasPendientes = $prestamo->saldos->where('estado', 'pendiente')->sortBy('fecha_cuota');

        return view('prestamos.show')->with([
            'prestamo' => $prestamo,
            'cuotasPendientes' => $cuotasPendientes,
        ]);
    }
    public function downloadPdf($id)
{
    // Cargar el préstamo con la relación `saldos`
    $prestamo = Prestamos::with('saldos')->find($id);

    if (empty($prestamo)) {
        Flash::error('Préstamo no encontrado.');
        return redirect(route('prestamos.index'));
    }

    // Obtener cuotas pendientes desde la relación `saldos`
    $cuotasPendientes = $prestamo->saldos->where('estado', 'pendiente')->sortBy('fecha_cuota');

    // Generar el PDF
    $pdf = PDF::loadView('prestamos.pdf', [
        'prestamo' => $prestamo,
        'cuotasPendientes' => $cuotasPendientes,
    ]);

    // Descargar el PDF
    return $pdf->download('prestamo_' . $prestamo->numero_prestamo . '.pdf');
}

    // Método para crear un nuevo préstamo
    public function create()
    {
        $clientes = Cliente::pluck('nombre', 'id');
       $electrodomesticos = Electrodomestico::select('id', 'nombre', 'precio_venta')
        ->get()
        ->mapWithKeys(function ($item) {
            return [$item->id => "{$item->nombre} - {$item->precio_venta} Gs"];
        })
        ->toArray();

        $cuotasPendientes = collect();  // Inicialmente no habrá cuotas pendientes en la creación
        // Obtén el último préstamo registrado
         $ultimoPrestamo = Prestamos::orderBy('numero_prestamo', 'desc')->first();
    
        // Calcula el siguiente número de préstamo
         $siguienteNumeroPrestamo = $ultimoPrestamo ? $ultimoPrestamo->numero_prestamo + 1 : 1;

        return view('prestamos.create',compact('clientes','electrodomesticos','siguienteNumeroPrestamo'));
    }

    public function store(Request $request)
{
    // Validar y guardar el préstamo
    $prestamo = new Prestamos();
    $prestamo->numero_prestamo = $request->numero_prestamo;
    $prestamo->tipo_prestamo = $request->tipo_prestamo;
    $prestamo->monto = $request->monto;
    $prestamo->zona = $request->zona;
    $prestamo->id_electrodomestico = $request->id_electrodomestico;
    $prestamo->monto_cuota = $request->monto_cuota;
    $prestamo->id_cliente = $request->id_cliente;
    $prestamo->cantidad_cuota = $request->cantidad_cuota;
    $prestamo->fecha_inicio = $request->fecha_inicio;
    $prestamo->frecuencia_pago = $request->frecuencia_pago;
    $prestamo->save();
 
      // Decodificar el JSON de cuotas
    $cuotas = json_decode($request->input('cuotas'), true);

    if (is_array($cuotas)) {
        foreach ($cuotas as $cuota) {
            $saldo = new Saldo();
            $saldo->id_cliente = $prestamo->id_cliente;
            $saldo->numero_prestamo = $prestamo->numero_prestamo;
            $saldo->nro_cuota = $cuota['nro_cuota']; 
            $saldo->fecha_cuota = $cuota['fecha'];
            $saldo->monto_cuota = $cuota['monto'];
            $saldo->estado = 'pendiente';
            $saldo->save();
        }
    } else {
        return redirect()->back()->withErrors(['error' => 'Error al generar las cuotas.']);
    }

    return redirect()->route('prestamos.index')->with('success', 'Préstamo y cuotas guardados correctamente.');
}

    // Método para mostrar la vista de edición de un préstamo
    public function edit($id)
    {
        $prestamo = $this->prestamosRepository->find($id);

        if (empty($prestamo)) {
            Flash::error('Préstamo no encontrado.');
            return redirect(route('prestamos.index'));
        }

        $clientes = Cliente::pluck('nombre', 'id');
        $cuotasPendientes = Saldo::where('numero_prestamo', $prestamo->numero_prestamo)
                                  ->where('estado', 'pendiente')
                                  ->orderBy('fecha_cuota')
                                  ->get();

        return view('prestamos.edit')->with([
            'prestamo' => $prestamo,
            'clientes' => $clientes,
            'cuotasPendientes' => $cuotasPendientes,
        ]);
    }

    // Método para actualizar un préstamo existente
    public function update($id, UpdatePrestamosRequest $request)
    {
        $prestamo = $this->prestamosRepository->find($id);
    
        if (empty($prestamo)) {
            Flash::error('Préstamo no encontrado.');
            return redirect(route('prestamos.index'));
        }
    
        $input = $request->all();
    
        // Procesar los montos eliminando los puntos y comas
        $input['monto'] = (float) str_replace(['.', ','], '', $input['monto']);
        $input['monto_cuota'] = (float) str_replace(['.', ','], '', $input['monto_cuota']);
    
        // Guardar la actualización del préstamo
        $prestamo = $this->prestamosRepository->update($input, $id);
    
        // Actualizar las cuotas en la tabla de saldos
        Saldo::where('numero_prestamo', $prestamo->numero_prestamo)->delete();
        $this->generarSaldos($prestamo, $input);
    
        Flash::success('Préstamo actualizado correctamente.');
        return redirect(route('prestamos.index'));
    }

    // Método para eliminar un préstamo
    public function destroy($id)
    {
        $prestamo = $this->prestamosRepository->find($id);

        if (empty($prestamo)) {
            Flash::error('Préstamo no encontrado.');
            return redirect(route('prestamos.index'));
        }

        // Eliminar las cuotas asociadas al préstamo en la tabla de saldos
        Saldo::where('numero_prestamo', $prestamo->numero_prestamo)->delete();
        $this->prestamosRepository->delete($id);

        Flash::success('Préstamo eliminado correctamente.');
        return redirect(route('prestamos.index'));
    }

   

    // Método para calcular las fechas de las cuotas
    public function calcularFechas($fechaInicio, $frecuenciaPago, $cantidadCuotas)
    {
        $fechas = [];

        for ($i = 0; $i < $cantidadCuotas; $i++) {
            switch ($frecuenciaPago) {
                case 'Diario':
                    $fecha = $fechaInicio->copy()->addDays($i);
                    break;
                case 'Semanal':
                    $fecha = $fechaInicio->copy()->addWeeks($i);
                    break;
                case 'Quincenal':
                    $fecha = $fechaInicio->copy()->addDays(15 * $i);
                    break;
                case 'Mensual':
                    $fecha = $fechaInicio->copy()->addMonths($i);
                    break;
                default:
                    $fecha = $fechaInicio;
                    break;
            }
            $fechas[] = $fecha->format('Y-m-d');
        }

        return $fechas;
    }
}











