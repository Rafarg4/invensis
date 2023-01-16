<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use DB;
class GraficoController extends Controller
{
    public function grafico(){
  
   	    $ingreso = Inscripcion::select(
              DB::raw('MONTH(created_at) as mes'),
              DB::raw('SUM(monto) as m'),
        )
       ->groupBy('mes')->get();
      $mes = [1,2,3,4,5,6,7,8,9,10,11,12];
      $monto_var = [0,0,0,0,0,0,0,0,0,0,0,0];
           
      foreach ($ingreso as $t) {
            
            $monto_var[$t->mes-1] = $t->m;
             
      }
      return view('graficos',compact('monto_var'));

   }

}
