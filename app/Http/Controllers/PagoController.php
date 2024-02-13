<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Repositories\PagoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tarifa;
use App\Models\Inscripcion;
use App\Models\Pago;
use Auth;
class PagoController extends AppBaseController
{
    /** @var PagoRepository $pagoRepository*/
    private $pagoRepository;

    public function __construct(PagoRepository $pagoRepo)
    {
        $this->pagoRepository = $pagoRepo;
    }

    /**
     * Display a listing of the Pago.
     *
     * @param Request $request
     *
     * @return Response
     */
     public function cambiar_estado_pago(Request $request, $id)
    {
        $nuevoEstado = $request->input('estado');

        // Aquí debes realizar la lógica para actualizar el estado en tu modelo, por ejemplo:
        $pago = Pago::find($id);
        $pago->estado = $nuevoEstado;
        $pago->save(); 
        
        return response()->json(['message' => 'Estado actualizado correctamente']);
    }
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('super_admin')) {
        $pagos = $this->pagoRepository->all();
        return view('pagos.index')
            ->with('pagos', $pagos);
        }else{ 
         $pagos= Pago::where('id_user', auth()->user()->id)->get();  
         return view('pagos.index')
            ->with('pagos', $pagos)->with('user', Auth::user());
    }
}
    /**
     * Show the form for creating a new Pago.
     *
     * @return Response
     */

    public function create()
    {   
        if(Auth::user()->hasRole('super_admin')) {
        $tarifas = Tarifa::pluck('tipo_plan','id');
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        return view('pagos.create',compact('tarifas','inscripcions'));
        }else{
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)->pluck('primer_y_segundo_nombre','id');
        $tarifas = Tarifa::pluck('tipo_plan','id');
        return view('pagos.create')->with('tarifas', $tarifas)->with('inscripcions', $inscripcions)->with('user', Auth::user());
     }
    }

    /**
     * Store a newly created Pago in storage.
     *
     * @param CreatePagoRequest $request
     *
     * @return Response
     */
    public function store(CreatePagoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('comprobante')) {
            $archivoPago = $request->file('comprobante');
            $nombreArchivoPago = $archivoPago->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoPago->storeAs('public/uploads', $nombreArchivoPago);
            $input['comprobante'] = $nombreArchivoPago;
        }

        $pago = $this->pagoRepository->create($input);

        Flash::success('Pago guardado correctamente.');

        return redirect(route('pagos.index'));
    }

    /**
     * Display the specified Pago.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('pagos.index'));
        }

        return view('pagos.show')->with('pago', $pago);
    }

    /**
     * Show the form for editing the specified Pago.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        $tarifas = Tarifa::pluck('tipo_plan','id');
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('pagos.index'));
        }

        return view('pagos.edit',compact('pago','tarifas','inscripcions'));
    }

    /**
     * Update the specified Pago in storage.
     *
     * @param int $id
     * @param UpdatePagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagoRequest $request)
    {
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('pagos.index'));
        }

        $pago = $this->pagoRepository->update($request->all(), $id);

        Flash::success('Pago actualizado correctamente.');

        return redirect(route('pagos.index'));
    }

    /**
     * Remove the specified Pago from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pago = $this->pagoRepository->find($id);

        if (empty($pago)) {
            Flash::error('Pago not found');

            return redirect(route('pagos.index'));
        }

        $this->pagoRepository->delete($id);

        Flash::success('Pago eliminado correctamente.');

        return redirect(route('pagos.index'));
    }
}
