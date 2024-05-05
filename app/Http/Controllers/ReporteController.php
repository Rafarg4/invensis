<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Seguro;
use App\Models\Ranking;
use App\Models\Pago;
use DB;
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

    	$rankings = DB::table('rankings')
        ->select('ci','nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis','fecha_siete','fecha_ocho','fecha_nueve','fecha_dies', DB::raw('fecha_uno + fecha_dos + fecha_tres + fecha_cuatro + fecha_cinco + fecha_seis + fecha_seis + fecha_ocho + fecha_nueve + fecha_dies AS totales'))
         ->where('rankings.deleted_at', null)
         ->get();   

    	return view('reportes.rankings',compact('rankings'));
    }
    public function reporte_pago(){
        $pagos = Pago::all();
        return view('reportes.pagos',compact('pagos'));
    }

}
