<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
class ReporteController extends Controller
{
    public function reporte(){

    	$reporte =Inscripcion::all();
    	return view('reportes',compact('reporte'));


    }

}
