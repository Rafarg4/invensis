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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reportes', [App\Http\Controllers\ReporteController::class, 'reporte'])->name('reportes');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);


Route::resource('pdf', App\Http\Controllers\PdfController::class);

Route::resource('inscripcions', App\Http\Controllers\InscripcionController::class);


Route::resource('documentos', App\Http\Controllers\DocumentoController::class);


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('rankings', App\Http\Controllers\RankingController::class);
