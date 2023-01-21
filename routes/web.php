<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/symlink', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reportes', [App\Http\Controllers\ReporteController::class, 'reporte'])->name('reportes');

Route::get('download/{id}', [App\Http\Controllers\PdfController::class, 'download'])->name('documento.download');

Route::resource('licencias', App\Http\Controllers\LicenciaController::class);

Route::get('/graficos', [App\Http\Controllers\GraficoController::class, 'grafico'])->name('graficos');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);


Route::resource('pdf', App\Http\Controllers\PdfController::class);

Route::resource('inscripcions', App\Http\Controllers\InscripcionController::class);


Route::resource('documentos', App\Http\Controllers\DocumentoController::class);


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('rankings', App\Http\Controllers\RankingController::class);


Route::resource('importar', App\Http\Controllers\ImportarController::class);

Route::resource('seguros', App\Http\Controllers\SeguroController::class);
