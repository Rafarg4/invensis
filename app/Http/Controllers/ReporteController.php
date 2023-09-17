<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Seguro;
use App\Models\Ranking;
class ReporteController extends Controller
{
   
    public function reporte_inscripcion(){

    	$inscripcions =Inscripcion::all();

    	return view('reportes.inscripcions',compact('inscripcions'));


    }
     public function reporte_seguro(){

    	$seguros =Seguro::all();

    	return view('reportes.seguros',compact('seguros'));


    }	
     public function reporte_ranking(){

    	$rankings =Ranking::where('deleted_at', null)
        ->get();   

    	return view('reportes.rankings',compact('rankings'));


    }

}
