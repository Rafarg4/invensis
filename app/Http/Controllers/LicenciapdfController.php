<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcionRequest;
use App\Http\Requests\UpdateInscripcionRequest;
use App\Repositories\InscripcionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use App\Models\Inscripcion;
class LicenciapdfController extends Controller
{
    public function licencias(Request $request)
    {
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)->get();
        return view('imprimir.licencias')->with('inscripcions', $inscripcions)->with('user', Auth::user());
       
     
}
}