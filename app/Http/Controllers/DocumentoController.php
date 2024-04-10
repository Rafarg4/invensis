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
    public function cambiar_estado_documento(Request $request, $id)
    {
        $nuevoEstado = $request->input('estado');

        // Aquí debes realizar la lógica para actualizar el estado en tu modelo, por ejemplo:
        $documento = Documento::find($id);
        $documento->estado = $nuevoEstado;
        $documento->save();

        return response()->json(['message' => 'Estado actualizado correctamente']);
    }
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
         $tipo_licencia = Inscripcion::where('id_user', auth()->user()->id)->pluck('tipo_licencia','id');
        return view('documentos.create', compact('inscripcions','tipo_licencia'));
         }else{
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)->pluck('primer_y_segundo_nombre','id');
        $tipo_licencia = Inscripcion::where('id_user', auth()->user()->id)->pluck('tipo_licencia');
        //return $tipo_licencia;
        return view('documentos.create')->with('inscripcions', $inscripcions)->with('tipo_licencia', $tipo_licencia)->with('user', Auth::user());
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
        if(Auth::user()->hasRole('super_admin')) {
        $rules = [
        'id_inscripcion'=>'required|unique:documentos,id_inscripcion',
        
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de documentos ya creado.',
      ];
      $this->validate($request,$rules,$mensaje);

        $input = $request->all();

        if ($request->hasFile('archivo_inscripcion')) {
            $archivoInscripcion = $request->file('archivo_inscripcion');
            $nombreArchivoInscripcion = $archivoInscripcion->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoInscripcion->storeAs('public/uploads', $nombreArchivoInscripcion);
            $input['archivo_inscripcion'] = $nombreArchivoInscripcion;
        }

        if ($request->hasFile('archivo_seguro_medico')) {
            $archivoSeguroMedico = $request->file('archivo_seguro_medico');
            $nombreArchivoSeguroMedico = $archivoSeguroMedico->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoSeguroMedico->storeAs('public/uploads', $nombreArchivoSeguroMedico);
            $input['archivo_seguro_medico'] = $nombreArchivoSeguroMedico;
        }

        if ($request->hasFile('archivo_copia_cedula')) {
            $archivoCopiaCedula = $request->file('archivo_copia_cedula');
            $nombreArchivoCopiaCedula = $archivoCopiaCedula->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoCopiaCedula->storeAs('public/uploads', $nombreArchivoCopiaCedula);
            $input['archivo_copia_cedula'] = $nombreArchivoCopiaCedula;
        }

        if ($request->hasFile('archivo_certificado_medico')) {
            $archivoCertificadoMedico = $request->file('archivo_certificado_medico');
            $nombreArchivoCertificadoMedico = $archivoCertificadoMedico->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoCertificadoMedico->storeAs('public/uploads', $nombreArchivoCertificadoMedico);
            $input['archivo_certificado_medico'] = $nombreArchivoCertificadoMedico;
        }
        if ($request->hasFile('firma_registro_fpc')) {
            $archivo_fpc = $request->file('firma_registro_fpc');
            $nombrearchivo_fpc = $archivo_fpc->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivo_fpc->storeAs('public/uploads', $nombrearchivo_fpc);
            $input['firma_registro_fpc'] = $nombrearchivo_fpc;
        }
        if ($request->hasFile('copia_cedula_fpc')) {
            $archivo_copia = $request->file('archivo_certificado_medico');
            $nombrearchivo_copia = $archivo_copia->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivo_copia->storeAs('public/uploads', $nombrearchivo_copia);
            $input['copia_cedula_fpc'] = $nombrearchivo_copia;
        }

        // Resto de tu código para crear el documento

        $documento = $this->documentoRepository->create($input);

        Flash::success('Documento guardado.');

        return redirect(route('documentos.index'));
    }else{
         $rules = [
        'id_inscripcion'=>'required|unique:documentos,id_inscripcion',
        
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
        'unique'=> 'Registro de documentos ya creado.',
      ];
      $this->validate($request,$rules,$mensaje);

        $input = $request->all();

        if ($request->hasFile('archivo_inscripcion')) {
            $archivoInscripcion = $request->file('archivo_inscripcion');
            $nombreArchivoInscripcion = $archivoInscripcion->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoInscripcion->storeAs('public/uploads', $nombreArchivoInscripcion);
            $input['archivo_inscripcion'] = $nombreArchivoInscripcion;
        }

        if ($request->hasFile('archivo_seguro_medico')) {
            $archivoSeguroMedico = $request->file('archivo_seguro_medico');
            $nombreArchivoSeguroMedico = $archivoSeguroMedico->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoSeguroMedico->storeAs('public/uploads', $nombreArchivoSeguroMedico);
            $input['archivo_seguro_medico'] = $nombreArchivoSeguroMedico;
        }

        if ($request->hasFile('archivo_copia_cedula')) {
            $archivoCopiaCedula = $request->file('archivo_copia_cedula');
            $nombreArchivoCopiaCedula = $archivoCopiaCedula->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoCopiaCedula->storeAs('public/uploads', $nombreArchivoCopiaCedula);
            $input['archivo_copia_cedula'] = $nombreArchivoCopiaCedula;
        }

        if ($request->hasFile('archivo_certificado_medico')) {
            $archivoCertificadoMedico = $request->file('archivo_certificado_medico');
            $nombreArchivoCertificadoMedico = $archivoCertificadoMedico->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivoCertificadoMedico->storeAs('public/uploads', $nombreArchivoCertificadoMedico);
            $input['archivo_certificado_medico'] = $nombreArchivoCertificadoMedico;
        }
        if ($request->hasFile('firma_registro_fpc')) {
            $archivo_fpc = $request->file('firma_registro_fpc');
            $nombrearchivo_fpc = $archivo_fpc->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivo_fpc->storeAs('public/uploads', $nombrearchivo_fpc);
            $input['firma_registro_fpc'] = $nombrearchivo_fpc;
        }
        if ($request->hasFile('copia_cedula_fpc')) {
            $archivo_copia = $request->file('archivo_certificado_medico');
            $nombrearchivo_copia = $archivo_copia->getClientOriginalName(); // Obtiene el nombre original del archivo
            $archivo_copia->storeAs('public/uploads', $nombrearchivo_copia);
            $input['copia_cedula_fpc'] = $nombrearchivo_copia;
        }
        $documento = $this->documentoRepository->create($input);

        return redirect(route('home'));

       }
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

       $datos = request()->except(['_token', '_method']);
$documento = Documento::findOrFail($id);

$archivos = [
    'archivo_pago',
    'archivo_inscripcion',
    'archivo_seguro_medico',
    'archivo_certificado_medico',
    'archivo_copia_cedula',
];

foreach ($archivos as $campo) {
    if ($request->hasFile($campo)) {
        $archivo = $request->file($campo);
        $nombreOriginal = $archivo->getClientOriginalName(); // Obtiene el nombre original del archivo

        // Elimina el archivo anterior
        $archivoAnterior = 'public/' . $documento->$campo;
        if (Storage::exists($archivoAnterior)) {
            Storage::delete($archivoAnterior);
        }

        // Almacena el nuevo archivo con el nombre original
        $datos[$campo] = $nombreOriginal;
        $archivo->storeAs('public/uploads', $nombreOriginal);
    }
}

Documento::where('id', $id)->update($datos);

$documento = Documento::findOrFail($id);

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
