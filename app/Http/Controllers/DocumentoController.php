<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Repositories\DocumentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Inscripcion;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;
use Auth;
class DocumentoController extends AppBaseController
{
    /** @var DocumentoRepository $documentoRepository*/
    private $documentoRepository;

    public function __construct(DocumentoRepository $documentoRepo)
    {
        $this->documentoRepository = $documentoRepo;
    }

    /**
     * Display a listing of the Documento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('super_admin')) {
        $documentos = Documento::all();
        return view('documentos.index',compact('documentos'));
        }else{ 
         $documentos= Documento::where('id_user', auth()->user()->id)->get();  
         return view('documentos.index')
            ->with('documentos', $documentos)->with('user', Auth::user());
    }
}

    /**
     * Show the form for creating a new Documento.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('super_admin')) {
         $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        return view('documentos.create', compact('inscripcions'));
         }else{
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)->pluck('primer_y_segundo_nombre','id');
        return view('documentos.create')->with('inscripcions', $inscripcions)->with('user', Auth::user());
     }
    }

    /**
     * Store a newly created Documento in storage.
     *
     * @param CreateDocumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentoRequest $request)
    {
        $rules = [
        'id_inscripcion'=>'required|unique:documentos,id_inscripcion',
        'archivo_pago' => 'required',
        'archivo_inscripcion' => 'required',
        'archivo_seguro_medico' => 'required',
        'archivo_copia_cedula' => 'required',
        'archivo_certificado_medico' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de documentos ya creado.',
      ];
      $this->validate($request,$rules,$mensaje);

        $input = $request->all();
        if($request->hasFile('archivo_pago')){
            $input['archivo_pago']=$request->file('archivo_pago')->store('uploads','public');   
        }
        if($request->hasFile('archivo_inscripcion')){
            $input['archivo_inscripcion']=$request->file('archivo_inscripcion')->store('uploads','public');   
        }
        if($request->hasFile('archivo_seguro_medico')){
            $input['archivo_seguro_medico']=$request->file('archivo_seguro_medico')->store('uploads','public');   
        }
        if($request->hasFile('archivo_copia_cedula')){
            $input['archivo_copia_cedula']=$request->file('archivo_copia_cedula')->store('uploads','public');   
        }
        if($request->hasFile('archivo_certificado_medico')){
            $input['archivo_certificado_medico']=$request->file('archivo_certificado_medico')->store('uploads','public');   
        }
        
        $documento = $this->documentoRepository->create($input);

        Flash::success('Documento guardado.');

        return redirect(route('documentos.index'));
    }

    /**
     * Display the specified Documento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento no encontrado');

            return redirect(route('documentos.index'));
        }

        return view('documentos.show')->with('documento', $documento);
    }

    /**
     * Show the form for editing the specified Documento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento no encontrado');

            return redirect(route('documentos.index'));
        }

        return view('documentos.edit',compact('inscripcions','documento'));
    }

    /**
     * Update the specified Documento in storage.
     *
     * @param int $id
     * @param UpdateDocumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentoRequest $request)
    {

         $rules = [
        'estado' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de documentos ya creado.',
      ];
            if($request->hasFile('archivo_pago')){
            $campo=['archivo_pago'=>'required'];  
             $mensaje = [
        'required'=>'El :attribute es requerido',
      ]; 
        }
        if($request->hasFile('archivo_inscripcion')){
            $campo=['archivo_inscripcion'=>'required'];
              $mensaje = [
        'required'=>'El :attribute es requerido',
      ];
        }
        if($request->hasFile('archivo_seguro_medico')){
            $campo=['archivo_seguro_medico'=>'required'];
             $mensaje = [
        'required'=>'El :attribute es requerido',
      ]; 
        }
        if($request->hasFile('archivo_certificado_medico')){
            $campo=['archivo_certificado_medico'=>'required'];
           $mensaje = [
        'required'=>'El :attribute es requerido',
      ];   
        } 
        if($request->hasFile('archivo_copia_cedula')){
           $campo=['archivo_copia_cedula'=>'required'];
          $mensaje = [
        'required'=>'El :attribute es requerido',
      ];    
        }
           
   $this->validate($request,$rules,$mensaje);

        $datos= request()->except(['_token','_method']);
       if($request->hasFile('archivo_pago')){
            $documento=Documento::findOrFail($id);
            Storage::delete('public/'.$documento->archivo_pago); 
            $datos['archivo_pago']=$request->file('archivo_pago')->store('uploads','public');   
        }

       if($request->hasFile('archivo_inscripcion')){
            $documento=Documento::findOrFail($id);
            Storage::delete('public/'.$documento->archivo_inscripcion); 
            $datos['archivo_inscripcion']=$request->file('archivo_inscripcion')->store('uploads','public');   
        }
        
       if($request->hasFile('archivo_seguro_medico')){
            $documento=Documento::findOrFail($id);
            Storage::delete('public/'.$documento->archivo_seguro_medico); 
            $datos['archivo_seguro_medico']=$request->file('archivo_seguro_medico')->store('uploads','public');   
        }
        if($request->hasFile('archivo_certificado_medico')){
            $documento=Documento::findOrFail($id);
            Storage::delete('public/'.$documento->archivo_certificado_medico); 
            $datos['archivo_certificado_medico']=$request->file('archivo_certificado_medico')->store('uploads','public');   
        }
        if($request->hasFile('archivo_copia_cedula')){
            $documento=Documento::findOrFail($id);
            Storage::delete('public/'.$documento->archivo_copia_cedula); 
            $datos['archivo_copia_cedula']=$request->file('archivo_copia_cedula')->store('uploads','public');   
        }
        Documento::where('id','=',$id)->update($datos);
        $documento=Documento::findOrFail($id);

        Flash::success('Documento actualizado.');

        return redirect(route('documentos.index'));
    }

    /**
     * Remove the specified Documento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documento = $this->documentoRepository->find($id);

        if (empty($documento)) {
            Flash::error('Documento no encontrado');

            return redirect(route('documentos.index'));
        }

        $this->documentoRepository->delete($id);

        Flash::success('Documento eliminado.');

        return redirect(route('documentos.index'));
    }
}
