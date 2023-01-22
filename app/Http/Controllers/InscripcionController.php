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
    
        $ci = $request->get('buscarpor');
        $inscripcions = Inscripcion::where('ci','like',"%$ci%")->paginate(3);
        return view('inscripcions.index',compact('inscripcions'));
          
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
        $input = $request->all();
         if($request->hasFile('foto')){
            $input['foto']=$request->file('foto')->store('uploads','public');   
        }
        $inscripcion = $this->inscripcionRepository->create($input);

        Flash::success('Inscripcion saved successfully.');

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
            Flash::error('Inscripcion not found');

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
            Flash::error('Inscripcion not found');

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
        $inscripcion = $this->inscripcionRepository->find($id);
        if($request->hasFile('foto')){
            $inscripcion=Inscripcion::findOrFail($id);
            Storage::delete('public/'.$inscripcion->foto); 
            $input['foto']=$request->file('foto')->store('uploads','public');   
        }
        if (empty($inscripcion)) {
            Flash::error('Inscripcion not found');

            return redirect(route('inscripcions.index'));
        }

        $inscripcion = $this->inscripcionRepository->update($request->all(), $id);

        Flash::success('Inscripcion updated successfully.');

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
            Flash::error('Inscripcion not found');

            return redirect(route('inscripcions.index'));
        }

        $this->inscripcionRepository->delete($id);

        Flash::success('Inscripcion deleted successfully.');

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
