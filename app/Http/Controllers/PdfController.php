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
         $pdf = PDF::loadView('inscripcions.pdf', compact('inscripcions'));
         return $pdf->download('Detalle-inscripto.pdf');
    }
   
    public function download_pago($id)
    {
      $documento = Documento::where('id', $id)->first()->archivo_pago;
      return Storage::download('public/' . $documento);

    }
    public function download_inscripcion($id)
    {
      $documento = Documento::where('id', $id)->first()->archivo_inscripcion;
      return Storage::download('public/' . $documento);

    }
    public function download_seguro($id)
    {
      $documento = Documento::where('id', $id)->first()->archivo_seguro_medico;
      return Storage::download('public/' . $documento);

    }

}
