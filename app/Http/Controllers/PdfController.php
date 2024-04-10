<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Repositories\InscripcionRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;
use PDF;
use App\Models\Documento;
use App\Models\Pago;
use Illuminate\Support\Facades\Storage;
class PdfController extends Controller
{ 
    /** @var InscripcionRepository $inscripcionRepository*/
    private $inscripcionRepository;

    public function __construct(InscripcionRepository $inscripcionRepo)
    {
        $this->inscripcionRepository = $inscripcionRepo;
    }

     public function show($id)
    {
        $inscripcions = $this->inscripcionRepository->find($id);
        return view('inscripcions.pdf',compact('inscripcions'));
         //$pdf = PDF::loadView('inscripcions.pdf', compact('inscripcions'));
        // return $pdf->download('Detalle-inscripto.pdf');
    }
   
    public function download_pago($id)
{
    $documento = Documento::where('id', $id)->first();
    
    if ($documento) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $documento->archivo_pago);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $documento->archivo_pago);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
   public function download_inscripcion($id)
{
    $documento = Documento::where('id', $id)->first();
    
    if ($documento) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $documento->archivo_inscripcion);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $documento->archivo_inscripcion);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
 public function download_seguro($id)
{
    $documento = Documento::where('id', $id)->first();
    
    if ($documento) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $documento->archivo_seguro_medico);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $documento->archivo_seguro_medico);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
 public function download_certificado($id)
{
    $documento = Documento::where('id', $id)->first();
    
    if ($documento) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $documento->archivo_certificado_medico);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $documento->archivo_certificado_medico);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
 public function download_copia($id)
{
    $documento = Documento::where('id', $id)->first();
    
    if ($documento) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $documento->archivo_copia_cedula);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $documento->archivo_copia_cedula);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
public function download_comprobante($id)
{
    $pago = Pago::where('id', $id)->first();
    
    if ($pago) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $pago->comprobante);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $pago->comprobante);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
 public function copia_cedula_fpc($id)
{
    $cedula = Documento::where('id', $id)->first();
    
    if ($cedula) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $cedula->copia_cedula_fpc);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $cedula->copia_cedula_fpc);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}
 public function firma_registro_fpc($id)
{
    $firma = Documento::where('id', $id)->first();
    
    if ($firma) {
        // Construye la ruta completa al archivo
        $archivoPath = storage_path('app/public/uploads/' . $firma->firma_registro_fpc);
        
        // Verifica si el archivo existe
        if (file_exists($archivoPath)) {
            return response()->download($archivoPath, $firma->firma_registro_fpc);
        }
    }

    // Si el documento no existe o el archivo no se encuentra, puedes manejar el error apropiadamente.
    abort(404, 'Archivo no encontrado');
}

}
