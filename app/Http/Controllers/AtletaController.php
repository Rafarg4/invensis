<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAtletaRequest;
use App\Http\Requests\UpdateAtletaRequest;
use App\Repositories\AtletaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Inscripcion;
use App\Models\Evento;
use App\Models\Pago;
use DB;
use Auth;
use App\Models\Atleta;
class AtletaController extends AppBaseController
{
    /** @var AtletaRepository $atletaRepository*/
    private $atletaRepository;

    public function __construct(AtletaRepository $atletaRepo)
    {
        $this->atletaRepository = $atletaRepo;
    }

    /**
     * Display a listing of the Atleta.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function registro_atleta (){

        return view('atletas.registro_atleta');

    }


 
    public function verificarCI($ci) {
    $participante = Inscripcion::where('ci', $ci)->first();

    if ($participante) {
        // El CI existe, devolver información del participante
        return response()->json(['existe' => true, 'participante' => $participante]);
    } else {
        // El CI no existe, devolver un indicador para mostrar el modal de registro como visitante
        return response()->json(['existe' => false]);
    }
}
    public function index(Request $request)
    {
         if(Auth::user()->hasRole('super_admin')) {
        $atletas = $this->atletaRepository->all();
        return view('atletas.index')
            ->with('atletas', $atletas);
        }else{ 
         $atletas= Atleta::where('id_user', auth()->user()->id)->get();  
         return view('atletas.index')
            ->with('atletas', $atletas)->with('user', Auth::user());
        }
    }

    /**
     * Show the form for creating a new Atleta.
     *
     * @return Response
     */
    public function create()
    {
        $evento = Evento::pluck('nombre','id');
        return view('atletas.create',compact('evento'));
    }

    /**
     * Store a newly created Atleta in storage.
     *
     * @param CreateAtletaRequest $request
     *
     * @return Response
     */
    public function store(CreateAtletaRequest $request)
    {
        $input = $request->all();

        $atleta = $this->atletaRepository->create($input);

        Flash::success('Atleta creado correctamente.');

        return redirect(route('atletas.index'));
    }
    public function guardar_atelta(CreateAtletaRequest $request)
    {
        $input = $request->all();

        $atleta = $this->atletaRepository->create($input);

        Flash::success('Atleta creado correctamente.');

        return redirect(route('ver_evento'));
    }

    /**
     * Display the specified Atleta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $atleta = $this->atletaRepository->find($id);
        $pagos = DB::table('pagos')
            ->where('id_user', $user_id)
            ->get();
        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        return view('atletas.show',compact('atleta','pagos'));
    }

    /**
     * Show the form for editing the specified Atleta.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $atleta = $this->atletaRepository->find($id);
        $evento = Evento::pluck('nombre','id');

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        return view('atletas.edit',compact('atleta','evento'));
    }

    /**
     * Update the specified Atleta in storage.
     *
     * @param int $id
     * @param UpdateAtletaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAtletaRequest $request)
    {
        $atleta = $this->atletaRepository->find($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        $atleta = $this->atletaRepository->update($request->all(), $id);

        Flash::success('Atleta actualizado.');

        return redirect(route('atletas.index'));
    }

    /**
     * Remove the specified Atleta from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $atleta = $this->atletaRepository->find($id);

        if (empty($atleta)) {
            Flash::error('Atleta not found');

            return redirect(route('atletas.index'));
        }

        $this->atletaRepository->delete($id);

        Flash::success('Atleta deleted successfully.');

        return redirect(route('atletas.index'));
    }
}
