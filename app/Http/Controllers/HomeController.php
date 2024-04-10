<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use Auth;
use App\Models\Seguro;
use App\Models\Documento;
use App\Models\Pago;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcions = Inscripcion::all()
        ->where('id_user', auth()->user()->id);
        $seguros = Seguro::all()
        ->where('id_user', auth()->user()->id);
        $documentos = Documento::all()
        ->where('id_user', auth()->user()->id);
        $pagos = Pago::all()
        ->where('id_user', auth()->user()->id);
        return view('home')->with('inscripcions', $inscripcions)->with('pagos', $pagos)->with('seguros', $seguros)->with('documentos', $documentos)->with('user', Auth::user());

       
    }
}
