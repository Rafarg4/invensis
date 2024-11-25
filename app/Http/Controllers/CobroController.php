<?php
 
namespace App\Http\Controllers;

use App\Http\Requests\CreateCobroRequest;
use App\Http\Requests\UpdateCobroRequest;
use App\Repositories\CobroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Saldo; // Importar el modelo Saldo para manejar las cuotas
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;
use DB;
use PDF;
use App\Models\Prestamos;
use App\Models\CobroDetalle;
class CobroController extends AppBaseController
{
    /** @var CobroRepository $cobroRepository */
    private $cobroRepository;

    public function __construct(CobroRepository $cobroRepo)
    {
        $this->cobroRepository = $cobroRepo;
    }

    public function index(Request $request)
    {
        $cobros = $this->cobroRepository->all();

        return view('cobros.index')
            ->with('cobros', $cobros);
    }

    public function create()
    {
        // Obtener la lista de clientes
        $clientes = Cliente::pluck('nombre', 'id');
        $cuotasPendientes = []; // Inicialmente vacío hasta que se seleccione un cliente

        return view('cobros.create', compact('clientes', 'cuotasPendientes'));
    }
    // Método para obtener los préstamos del cliente
  public function getPrestamos(Request $request, $id_cliente)
{
    try {
        $prestamos = Prestamos::where('id_cliente', $id_cliente)->get(['id', 'numero_prestamo']);
        
        // Verificar si se encontraron préstamos
        if ($prestamos->isEmpty()) {
            return response()->json(['error' => 'No se encontraron préstamos para este cliente.'], 404);
        }

        // Transformar la colección a un formato más simple para enviar como respuesta
        $prestamosArray = [];
        foreach ($prestamos as $prestamo) {
            $prestamosArray[$prestamo->id] = [
                'numero_prestamo' => $prestamo->numero_prestamo // Aquí estás enviando el numero_prestamo
            ];
        }

        return response()->json($prestamosArray);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()], 500);
    }
}

       public function getSaldos($id_prestamo)
{
    try {
       
        $saldosArray = Saldo::where('numero_prestamo', $id_prestamo)
        ->where('estado','<>','Pagado')
        ->get();
    

        return response()->json($saldosArray);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()], 500);
    }
}


   public function store(Request $request)
{
    $input = $request->all();
    $detalles = $request->input('detalles');

    // Guarda el cobro principal
    $cobro = $this->cobroRepository->create($input);

    foreach ($detalles as $detalle) {
        $cuota = Saldo::find($detalle['id']); // Buscar la cuota por ID

        if ($cuota) {
            $montoPagado = floatval($detalle['montoPagado']); // Monto pagado
            $saldoActual = floatval($cuota->saldo_cuota); // Saldo actual de la cuota

            // Actualizar el saldo de la cuota
            $nuevoSaldo = $saldoActual - $montoPagado;
            $cuota->saldo_cuota = $nuevoSaldo;

            // Actualizar el estado de la cuota
            if ($nuevoSaldo <= 0) {
                $cuota->estado = 'pagado'; // Estado cuando el saldo es cero
                $cuota->saldo_cuota = 0; // Asegurarse de que no quede saldo negativo
            } elseif ($nuevoSaldo > 0 && $nuevoSaldo < $saldoActual) {
                $cuota->estado = 'parcial'; // Estado cuando queda saldo
            }

            $cuota->save(); // Guardar los cambios en la cuota

            // Guardar el detalle del cobro
            $cobroDetalle = new CobroDetalle();
            $cobroDetalle->cobro_id = $cobro->id; // Asocia el detalle con el cobro
            $cobroDetalle->nro_cuota = $detalle['nroCuota'];
            $cobroDetalle->monto_cuota = $detalle['saldoCuota'];
            $cobroDetalle->monto_pagado = $detalle['montoPagado'];
            $cobroDetalle->fecha_pago = $detalle['fechaPago'];
            $cobroDetalle->save();
        }
    }

    return redirect()->route('cobros.index')->with('success', 'Cobro registrado correctamente.');
}

// En tu controlador CobroController
    public function show($id)
    {
        $cobro = $this->cobroRepository->find($id);
        $cobro_detalles = DB::table('cobros')
        ->join('cobro_detalles', 'cobros.id', '=', 'cobro_detalles.cobro_id')
        ->where('cobros.id', $id)
        ->select('cobros.*', 'cobro_detalles.*')
        ->get();
        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');
            return redirect(route('cobros.index'));
        }

        return view('cobros.show')->with('cobro', $cobro)->with('cobro_detalles', $cobro_detalles);
    }
    public function descargar_pago($id)
{
    // Obtener el cobro
    $cobro = $this->cobroRepository->find($id);

    // Obtener los detalles del cobro
    $cobro_detalles = DB::table('cobros')
        ->join('cobro_detalles', 'cobros.id', '=', 'cobro_detalles.cobro_id')
        ->where('cobros.id', $id)
        ->select('cobros.*', 'cobro_detalles.*')
        ->get();

    // Verificar si el cobro existe
    if (empty($cobro)) {
        Flash::error('Cobro no encontrado.');
        return redirect(route('cobros.index'));
    }

    // Generar el PDF
    $pdf = PDF::loadView('cobros.pdf', compact('cobro', 'cobro_detalles'));

    // Descargar el PDF
    return $pdf->download('cobro_' . $id . '.pdf');
}

    public function edit($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');
            return redirect(route('cobros.index'));
        }

        // Obtener la lista de clientes para la edición y cuotas pendientes para el cliente
        $clientes = Cliente::pluck('nombre', 'id');
        $cuotasPendientes = Saldo::where('id_cliente', $cobro->id_cliente)
                                ->where('estado', 'pendiente')
                                ->orderBy('fecha_cuota')
                                ->get();

        return view('cobros.edit', compact('cobro', 'clientes', 'cuotasPendientes'));
    }

    public function update($id, UpdateCobroRequest $request)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');
            return redirect(route('cobros.index'));
        }

        $input = $request->all();
        $input['usuario'] = Auth::user()->name;

        // Actualizar el cobro y el estado de la cuota seleccionada
        $this->cobroRepository->update($input, $id);
        if (isset($input['cuota_id'])) {
            Saldo::where('id', $input['cuota_id'])->update(['estado' => 'pagado']);
        }

        Flash::success('Cobro actualizado correctamente.');
        return redirect(route('cobros.index'));
    }

    public function destroy($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');
            return redirect(route('cobros.index'));
        }

        $this->cobroRepository->delete($id);
        Flash::success('Cobro eliminado correctamente.');
        return redirect(route('cobros.index'));
    }
}


