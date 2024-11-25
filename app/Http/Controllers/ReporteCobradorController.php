<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cobro;
use DB;
use PDF;
class ReporteCobradorController extends Controller
{
    public function ver_reporte_cobro(){
    	$cobradores = User::pluck('name','id');
    	return view('reporte_cobros.ver_reporte_cobros',compact('cobradores'));
    }	
   public function generar_reporte(Request $request)
{
    // Obtener los parámetros de la solicitud
    $usuario = $request->input('usuario');  // Cobrador (campo usuario)
    $fechaInicio = $request->input('fecha_inicio');  // Fecha inicio
    $fechaFin = $request->input('fecha_fin');  // Fecha fin
    //return $request->all();
    // Filtrar los cobros según el usuario y el rango de fechas
    $cobros = Cobro::where('usuario', '=', $usuario)  // Filtro por cobrador
                    ->whereBetween('fecha_cobro', [$fechaInicio, $fechaFin])  // Filtro por rango de fechas
                    ->get();
     //return $cobros;
    // Ahora que tenemos los cobros filtrados, podemos obtener los detalles asociados
    $cobro_detalles = DB::table('cobro_detalles')
                        ->join('cobros', 'cobros.id', '=', 'cobro_detalles.cobro_id')
                        ->whereIn('cobros.id', $cobros->pluck('id'))  // Usamos los IDs de los cobros filtrados
                        ->get();
	//return $cobro_detalles;
  // Generar el PDF con los datos necesarios
    $pdf = PDF::loadView('reporte_cobros.reporte_pdf', compact('cobro_detalles', 'cobros', 'usuario', 'fechaInicio', 'fechaFin'));

    // Crear un nombre dinámico para el archivo (incluye "Reporte-cobro" y el nombre del usuario)
    $fileName = 'Reporte-cobro-' . $usuario . '.pdf';

    // Descargar el archivo PDF con el nombre dinámico
    return $pdf->download($fileName);
}

}
