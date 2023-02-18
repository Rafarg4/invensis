<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Repositories\InscripcionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Categoria;
use App\Models\Inscripcion;
use App\Models\Documento;
use App\Models\Seguro;
use PDF;
use Auth;
use Illuminate\Support\Facades\Storage;
class InscripcionController extends AppBaseController
{
    /** @var InscripcionRepository $inscripcionRepository*/
    private $inscripcionRepository;

    public function __construct(InscripcionRepository $inscripcionRepo)
    {
        $this->inscripcionRepository = $inscripcionRepo;
    }

    /**
     * Display a listing of the Inscripcion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
      if(Auth::user()->hasRole('super_admin')) {
       $ci = $request->get('buscarpor');
        $inscripcions = Inscripcion::where('ci','like',"%$ci%")->paginate(3);
        return view('inscripcions.index',compact('inscripcions'));
     }else{
        $ci = $request->get('buscarpor');
        $inscripcions = Inscripcion::where('ci','like',"%$ci%")
        ->where('id_user', auth()->user()->id)
        ->paginate(3);
        return view('inscripcions.index')->with('inscripcions', $inscripcions)->with('user', Auth::user());
     } 

    }

    /**
     * Show the form for creating a new Inscripcion.
     *
     * @return Response
     */
    public function create()
    {
        $categoria = Categoria::pluck('nombre','id');
        return view('inscripcions.create', compact('categoria'));
    }

    /**
     * Store a newly created Inscripcion in storage.
     *
     * @param CreateInscripcionRequest $request
     *
     * @return Response
     */
    public function store(CreateInscripcionRequest $request)
    {
        $rules = [
        'ci'=>'required|unique:inscripcions,ci',
        'foto' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de inscripcion ya creado.',
      ];
      $this->validate($request,$rules,$mensaje);
        $input = $request->all();
         if($request->hasFile('foto')){
            $input['foto']=$request->file('foto')->store('uploads','public');   
        }
        $inscripcion = $this->inscripcionRepository->create($input);

        Flash::success('Inscripcion creada.');

        return redirect(route('inscripcions.index'));
    }

    /**
     * Display the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscripcion = $this->inscripcionRepository->find($id);
        $documento = Documento::where('id_inscripcion',$id)->get();
        $seguros = Seguro::where('id_inscripcion',$id)->get();

        if (empty($inscripcion)) {
            Flash::error('Inscripcion no encontrado');

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.show',compact('inscripcion','documento','seguros'));
    }

    /**
     * Show the form for editing the specified Inscripcion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    $categoria = Categoria::pluck('nombre','id');
    $inscripcion = $this->inscripcionRepository->find($id);

        if (empty($inscripcion)) {
            Flash::error('Inscripcion no encontrado');

            return redirect(route('inscripcions.index'));
        }

        return view('inscripcions.edit',compact('inscripcion','categoria'));
    }

    /**
     * Update the specified Inscripcion in storage.
     *
     * @param int $id
     * @param UpdateInscripcionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscripcionRequest $request)
    {
        //Verifica si la foto existe para no volver a cargar
        if($request->hasFile('foto')){
            $campo=['foto'=>'required|mines:jpeg,png,jpg'];
             
        }
        if($request->hasFile('foto')){
            $inscripcion=Inscripcion::findOrFail($id);
            Storage::delete('public/'.$inscripcion->foto); 
            $dato['foto']=$request->file('foto')->store('uploads','public');   
        }
        Inscripcion::where('id','=',$id)->update($dato);
        $inscripcion=Inscripcion::findOrFail($id);
        Flash::success('Inscripcion actualizada.');

        return redirect(route('inscripcions.index'));
    }

    /**
     * Remove the specified Inscripcion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscripcion = $this->inscripcionRepository->find($id);

        if (empty($inscripcion)) {
            Flash::error('Inscripcion no encontrado');

            return redirect(route('inscripcions.index'));
        }

        $this->inscripcionRepository->delete($id);

        Flash::success('Inscripcion eliminada.');

        return redirect(route('inscripcions.index'));
    }
    public function seguro($id)
    {
    $seguro = Seguro::where('id_inscripcion',$id)->get();
    $inscripcion = $this->inscripcionRepository->find($id);
    $pdf = PDF::loadView('inscripcions.seguro', compact('inscripcion','seguro'));
    return $pdf->download('Seguro.pdf');
    }
}
