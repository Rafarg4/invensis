
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RankingMTBController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
   });
}); 
Route::get('/symlink', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});

Auth::routes();
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['permission:create_inscripcion|edit_inscripcion|delete_inscripcion|admin_inscripcion']], function () {

Route::get('reportes/inscripcions', [App\Http\Controllers\ReporteController::class, 'reporte_inscripcion'])->name('reporte_inscripcion')->middleware('auth');

Route::get('reportes/pagos', [App\Http\Controllers\ReporteController::class, 'reporte_pago'])->name('reporte_pago')->middleware('auth');

Route::get('reportes/seguros', [App\Http\Controllers\ReporteController::class, 'reporte_seguro'])->name('reporte_seguro')->middleware('auth');

Route::get('reportes/rankings', [App\Http\Controllers\ReporteController::class, 'reporte_ranking'])->name('reporte_ranking')->middleware('auth');
Route::get('download_pago/{id}', [App\Http\Controllers\PdfController::class, 'download_pago'])->name('documento.download_pago')->middleware('auth');
Route::get('download_comprobante/{id}', [App\Http\Controllers\PdfController::class, 'download_comprobante'])->name('comprobante.download_comprobante')->middleware('auth');
Route::get('download_inscripcion/{id}', [App\Http\Controllers\PdfController::class, 'download_inscripcion'])->name('documento.download_inscripcion')->middleware('auth');
Route::get('download_seguro/{id}', [App\Http\Controllers\PdfController::class, 'download_seguro'])->name('documento.download_seguro')->middleware('auth');

Route::get('firma_registro_fpc/{id}', [App\Http\Controllers\PdfController::class, 'firma_registro_fpc'])->name('documento.firma_registro_fpc')->middleware('auth');
Route::get('copia_cedula_fpc/{id}', [App\Http\Controllers\PdfController::class, 'copia_cedula_fpc'])->name('documento.copia_cedula_fpc')->middleware('auth');


Route::get('download_copia/{id}', [App\Http\Controllers\PdfController::class, 'download_copia'])->name('documento.download_copia')->middleware('auth');
Route::get('download_certificado/{id}', [App\Http\Controllers\PdfController::class, 'download_certificado'])->name('documento.download_certificado')->middleware('auth');

Route::get('seguro/{id}', [App\Http\Controllers\InscripcionController::class, 'seguro'])->name('seguro')->middleware('auth');
Route::get('descargarseguro/{id}', [App\Http\Controllers\SeguroController::class, 'descargarseguro'])->name('descargarseguro')->middleware('auth');
Route::post('/seguros/{id}/marcar-descargado', [App\Http\Controllers\SeguroController::class, 'marcarDescargado'])->name('marcarSeguroDescargado');

Route::post('/seguros/{id}/marcar-documento', [App\Http\Controllers\SeguroController::class, 'marcarDocumento'])->name('marcarSeguroDocumento');




Route::resource('licencias', App\Http\Controllers\LicenciaController::class)->middleware('auth');

Route::get('/graficos', [App\Http\Controllers\GraficoController::class, 'grafico'])->name('graficos')->middleware('auth');

Route::get('rankings/consulta', [App\Http\Controllers\RankingController::class, 'consulta'])->name('rankings/consulta');
Route::get('ranking_m_tbs/consulta', [App\Http\Controllers\RankingMTBController::class, 'consulta'])->name('rankingmtbs/consulta');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');


Route::resource('pdf', App\Http\Controllers\PdfController::class)->middleware('auth');

Route::resource('inscripcions', App\Http\Controllers\InscripcionController::class)->middleware('auth');
Route::get('/inscripcions/licencia_dia/{id}', [App\Http\Controllers\InscripcionController::class, 'ver_licencia'])->name('ver_licencia');

Route::resource('documentos', App\Http\Controllers\DocumentoController::class)->middleware('auth');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('rankings', App\Http\Controllers\RankingController::class)->middleware('auth');


Route::resource('importar', App\Http\Controllers\ImportarController::class)->middleware('auth');

Route::resource('importar_mtb', App\Http\Controllers\ImportarMTBController::class)->middleware('auth');


Route::resource('seguros', App\Http\Controllers\SeguroController::class)->middleware('auth');

Route::get('imprimir/licencias', [App\Http\Controllers\LicenciapdfController::class, 'licencias'])->name('licencias')->middleware('auth');


//});

Route::get('backup', [App\Http\Controllers\BackupController::class, 'index'])->name('backup')->middleware('auth');

Route::post('backup/create/', 'App\Http\Controllers\BackupController@create');

Route::get('backup/download/{file_name}', 'App\Http\Controllers\BackupController@download');

Route::get('backup/delete/{file_name}', 'App\Http\Controllers\BackupController@delete');


Route::resource('tarifas', App\Http\Controllers\TarifaController::class);


Route::resource('rankingMTBs', App\Http\Controllers\RankingMTBController::class);

//Route::get('/rankings/ver_ranking/{id}', 'App\Http\Controllers\RankingController@ver_ranking');

Route::get('ranking/ver_ranking/{id}', [App\Http\Controllers\RankingController::class, 'ver_ranking'])->name('ranking/ver_ranking');

Route::get('ranking/ver_ranking_mtb/{id}', [App\Http\Controllers\RankingMTBController::class, 'ver_ranking_mtb'])->name('ranking/ver_ranking_mtb');

Route::post('cambiar_estado/{id}', [App\Http\Controllers\InscripcionController::class, 'cambiar_estado'])->name('cambiar_estado');

Route::post('cambiar_estado_documento/{id}', [App\Http\Controllers\DocumentoController::class, 'cambiar_estado_documento'])->name('cambiar_estado_documento');


Route::post('/eliminar_ranking', [RankingController::class, 'eliminar_todo']);
Route::post('/eliminar_ranking_mtb', [RankingMTBController::class, 'eliminar_ranking_mtb']);

Route::post('/pago/{id}', 'App\Http\Controllers\InscripcionController@pago')->name('pago');

Route::post('/por_dia/{id}', 'App\Http\Controllers\InscripcionController@por_dia')->name('por_dia');

Route::post('cambiar_estado/{id}', [App\Http\Controllers\InscripcionController::class, 'cambiar_estado'])->name('cambiar_estado');

Route::resource('pagos', App\Http\Controllers\PagoController::class);
Route::post('cambiar_estado_pago/{id}', [App\Http\Controllers\PagoController::class, 'cambiar_estado_pago'])->name('cambiar_estado_pago');

Route::post('cambiar_estado_atleta/{id}', [App\Http\Controllers\AtletaController::class, 'cambiar_estado_atleta'])->name('cambiar_estado_atleta');

Route::resource('eventos', App\Http\Controllers\EventoController::class);

Route::resource('atletas', App\Http\Controllers\AtletaController::class);

Route::get('/buscar', [App\Http\Controllers\EventoController::class, 'buscar'])->name('buscar');


Route::get('ver_evento', [App\Http\Controllers\EventoController::class, 'ver_evento'])->name('ver_evento');

Route::get('inicio', [App\Http\Controllers\EventoController::class, 'inicio'])->name('inicio');

Route::get('registro_atleta', [App\Http\Controllers\AtletaController::class, 'registro_atleta'])->name('registro_atleta');
// En tu archivo de rutas web.php
Route::post('/guardar-descarga/{id}', [App\Http\Controllers\InscripcionController::class, 'guardarDescarga'])->name('guardarDescarga');
Route::post('/guardar-seguro/{id}', [App\Http\Controllers\InscripcionController::class, 'actualizarSeguro'])->name('actualizarSeguro');

Route::get('ver_eventos_detalles/{id}', [App\Http\Controllers\EventoController::class, 'ver_eventos_detalles'])->name('ver_eventos_detalles');

Route::get('eventos_detalles/{id}', [App\Http\Controllers\EventoController::class, 'eventos_detalles'])->name('eventos_detalles');

Route::post('/guardar_atelta', [App\Http\Controllers\AtletaController::class, 'guardar_atelta'])->name('guardar_atelta');


Route::resource('bancos', App\Http\Controllers\BancoController::class);


Route::resource('modalidads', App\Http\Controllers\ModalidadController::class);

Route::get('/modalidades/{id_categoria}', [App\Http\Controllers\InscripcionController::class, 'getModalidades']);


Route::get('/categorias_edad/{edad}', [App\Http\Controllers\InscripcionController::class, 'getCategoriasByEdad']);


Route::resource('clientes', App\Http\Controllers\ClienteController::class);


Route::resource('cierres', App\Http\Controllers\CierreController::class);


Route::resource('cobros', App\Http\Controllers\CobroController::class);


Route::resource('electrodomesticos', App\Http\Controllers\ElectrodomesticoController::class);


Route::resource('prestamos', App\Http\Controllers\PrestamosController::class);


Route::get('prestamos/{id}/pdf', [App\Http\Controllers\PrestamosController::class, 'downloadPdf'])->name('prestamos.downloadPdf');


Route::get('/cobros/prestamos/{id_cliente}', [App\Http\Controllers\CobroController::class, 'getPrestamos']);


Route::get('/cobros/saldos/{prestamoId}', [App\Http\Controllers\CobroController::class, 'getSaldos']);


Route::post('/cobros/guardar-detalles', [App\Http\Controllers\CobroController::class, 'guardarDetalles'])->name('cobros.guardarDetalles');

Route::get('descargar_pago/{id}', [App\Http\Controllers\CobroController::class, 'descargar_pago'])->name('descargar_pago');

Route::get('ver_reporte_cobro', [App\Http\Controllers\ReporteCobradorController::class, 'ver_reporte_cobro'])->middleware('auth');

Route::post('/generar_reporte', [App\Http\Controllers\ReporteCobradorController::class, 'generar_reporte'])->name('generar_reporte');

Route::post('/reporte-pdf', [ReporteCobradorController::class, 'reporte-pdf'])->name('reporte-pdf');
