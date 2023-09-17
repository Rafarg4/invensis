<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;
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
Route::get('/seguridad', function() {
  Artisan::call('backup:run'); 
  return response()->json(['success' => 'Backup for database created']);
});
Auth::routes();
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['permission:create_inscripcion|edit_inscripcion|delete_inscripcion|admin_inscripcion']], function () {
	

Route::get('reportes/inscripcions', [App\Http\Controllers\ReporteController::class, 'reporte_inscripcion'])->name('reporte_inscripcion')->middleware('auth');

Route::get('reportes/seguros', [App\Http\Controllers\ReporteController::class, 'reporte_seguro'])->name('reporte_seguro')->middleware('auth');

Route::get('reportes/rankings', [App\Http\Controllers\ReporteController::class, 'reporte_ranking'])->name('reporte_ranking')->middleware('auth');
Route::get('download_pago/{id}', [App\Http\Controllers\PdfController::class, 'download_pago'])->name('documento.download_pago')->middleware('auth');
Route::get('download_inscripcion/{id}', [App\Http\Controllers\PdfController::class, 'download_inscripcion'])->name('documento.download_inscripcion')->middleware('auth');
Route::get('download_seguro/{id}', [App\Http\Controllers\PdfController::class, 'download_seguro'])->name('documento.download_seguro')->middleware('auth');


Route::get('download_copia/{id}', [App\Http\Controllers\PdfController::class, 'download_copia'])->name('documento.download_copia')->middleware('auth');
Route::get('download_certificado/{id}', [App\Http\Controllers\PdfController::class, 'download_certificado'])->name('documento.download_certificado')->middleware('auth');

Route::get('seguro/{id}', [App\Http\Controllers\InscripcionController::class, 'seguro'])->name('seguro')->middleware('auth');


Route::resource('licencias', App\Http\Controllers\LicenciaController::class)->middleware('auth');

Route::get('/graficos', [App\Http\Controllers\GraficoController::class, 'grafico'])->name('graficos')->middleware('auth');

Route::get('rankings/consulta', [App\Http\Controllers\RankingController::class, 'consulta'])->name('rankings/consulta');
Route::get('ranking_m_tbs/consulta', [App\Http\Controllers\RankingMTBController::class, 'consulta'])->name('rankingmtbs/consulta');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');


Route::resource('pdf', App\Http\Controllers\PdfController::class)->middleware('auth');

Route::resource('inscripcions', App\Http\Controllers\InscripcionController::class)->middleware('auth');


Route::resource('documentos', App\Http\Controllers\DocumentoController::class)->middleware('auth');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('rankings', App\Http\Controllers\RankingController::class)->middleware('auth');


Route::resource('importar', App\Http\Controllers\ImportarController::class)->middleware('auth');

Route::resource('importar_mtb', App\Http\Controllers\ImportarMTBController::class)->middleware('auth');


Route::resource('seguros', App\Http\Controllers\SeguroController::class)->middleware('auth');

Route::get('imprimir/licencias', [App\Http\Controllers\LicenciapdfController::class, 'licencias'])->name('licencias')->middleware('auth');


//});

Route::get('backup', [App\Http\Controllers\BackupController::class, 'index'])->name('backup')->middleware('auth');

Route::get('backup/create/', 'App\Http\Controllers\BackupController@create');
Route::get('backup/download/{file_name}', 'App\Http\Controllers\BackupController@download');

Route::get('backup/delete/{file_name}', 'App\Http\Controllers\BackupController@delete');


Route::resource('tarifas', App\Http\Controllers\TarifaController::class);


Route::resource('rankingMTBs', App\Http\Controllers\RankingMTBController::class);

//Route::get('/rankings/ver_ranking/{id}', 'App\Http\Controllers\RankingController@ver_ranking');

Route::get('ranking/ver_ranking/{id}', [App\Http\Controllers\RankingController::class, 'ver_ranking'])->name('ranking/ver_ranking');