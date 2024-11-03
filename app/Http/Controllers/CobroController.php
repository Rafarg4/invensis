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
use App\Models\Prestamos;
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
       
        $saldosArray = Saldo::where('numero_prestamo', $id_prestamo)->get();
    

        return response()->json($saldosArray);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()], 500);
    }
}


    public function store(CreateCobroRequest $request)
    {
        $input = $request->all();

        // Agregar el nombre del usuario autenticado al registro
        $input['usuario'] = Auth::user()->name;

        // Registrar el cobro y actualizar el estado de la cuota
        $cobro = $this->cobroRepository->create($input);
        if (isset($input['cuota_id'])) {
            Saldo::where('id', $input['cuota_id'])->update(['estado' => 'pagado']);
        }

        Flash::success('Cobro guardado correctamente.');

        return redirect(route('cobros.index'));
    }

    public function show($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');
            return redirect(route('cobros.index'));
        }

        return view('cobros.show')->with('cobro', $cobro);
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


