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



Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('/');

Route::get('/organizacionVisualizacion', [App\Http\Controllers\FrontController::class, 'indexOrganizacion'])->name('organizacionVisualizacion');

Route::get('/canastaVisualizacion', [App\Http\Controllers\FrontController::class, 'indexCanasta'])->name('canastaVisualizacion');

Route::get('/canastaVisualizacionPrecioAsc', [App\Http\Controllers\FrontController::class, 'indexCanastaPrecioAsc'])->name('canastaVisualizacionPrecioAsc');
Route::get('/canastaVisualizacionPrecioDesc', [App\Http\Controllers\FrontController::class, 'indexCanastaPrecioDesc'])->name('canastaVisualizacionPrecioDesc');
Route::get('/canastaVisualizacionNombreAsc', [App\Http\Controllers\FrontController::class, 'indexCanastaNombreAsc'])->name('canastaVisualizacionNombreAsc');
Route::get('/canastaVisualizacionNombreDesc', [App\Http\Controllers\FrontController::class, 'indexCanastaNombreDesc'])->name('canastaVisualizacionNombreDesc');




Route::get('/ofertaVisualizacion', [App\Http\Controllers\FrontController::class, 'indexOferta'])->name('ofertaVisualizacion');

Route::get('/ofertaVisualizacionPrecioAsc', [App\Http\Controllers\FrontController::class, 'indexOfertaPrecioAsc'])->name('ofertaVisualizacionPrecioAsc');
Route::get('/ofertaVisualizacionPrecioDesc', [App\Http\Controllers\FrontController::class, 'indexOfertaPrecioDesc'])->name('ofertaVisualizacionPrecioDesc');
Route::get('/ofertaVisualizacionNombreAsc', [App\Http\Controllers\FrontController::class, 'indexOfertaNombreAsc'])->name('ofertaVisualizacionNombreAsc');
Route::get('/ofertaVisualizacionNombreDesc', [App\Http\Controllers\FrontController::class, 'indexOfertaNombreDesc'])->name('ofertaVisualizacionNombreDesc');

Route::get('/inversionistaVisualizacion', [App\Http\Controllers\FrontController::class, 'indexInversionista'])->name('inversionistaVisualizacion');

Route::get('/eventoVisualizacion', [App\Http\Controllers\FrontController::class, 'indexEvento'])->name('eventoVisualizacion');







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');


Route::get('/canasta',[App\Http\Controllers\CanastaController::class, 'index'])->name('index.index');
Route::get('/canasta/create',[App\Http\Controllers\CanastaController::class,'create'])->name('canasta.create');
Route::post('/canasta',[App\Http\Controllers\CanastaController::class,'store']);
Route::get('/canasta/{canasta}/edit', [App\Http\Controllers\CanastaController::class, 'edit'])->name('canasta.edit');
Route::put('/canasta/{canasta}', [App\Http\Controllers\CanastaController::class, 'update'])->name('canasta.update');
Route::delete('/canasta/{canasta}', [App\Http\Controllers\CanastaController::class, 'destroy'])->name('canasta.delete');


Route::get('/organizacion',[App\Http\Controllers\OrganizacionController::class, 'index'])->name('index.index');
Route::get('/organizacion/create',[App\Http\Controllers\OrganizacionController::class, 'create'])->name('organizacion.create');
Route::post('/organizacion',[App\Http\Controllers\OrganizacionController::class, 'store']);
Route::get('/organizacion/{organizacion}',[App\Http\Controllers\OrganizacionController::class, 'edit'])->name('organizacion.edit');
Route::put('/organizacion/{organizacion}',[App\Http\Controllers\OrganizacionController::class, 'update'])->name('organizacion.update');
Route::delete('/organizacion/{organizacion}',[App\Http\Controllers\OrganizacionController::class, 'destroy'])->name('organizacion.delete');

Route::get('/inversionista',[App\Http\Controllers\InversionistaController::class, 'index'])->name('index.index');
Route::get('/inversionista/create',[App\Http\Controllers\InversionistaController::class,'create'])->name('inversionista.create');
Route::post('/inversionista',[App\Http\Controllers\InversionistaController::class,'store']);
Route::get('/inversionista/{inversionista}/edit', [App\Http\Controllers\InversionistaController::class, 'edit'])->name('inversionista.edit');
Route::put('/inversionista/{inversionista}', [App\Http\Controllers\InversionistaController::class, 'update'])->name('inversionista.update');
Route::delete('/inversionista/{inversionista}', [App\Http\Controllers\InversionistaController::class, 'destroy'])->name('inversionista.delete');



Route::get('/oferta',[App\Http\Controllers\OfertaController::class, 'index'])->name('index.index');
Route::get('/oferta/create',[App\Http\Controllers\OfertaController::class,'create'])->name('oferta.create');
Route::post('/oferta',[App\Http\Controllers\OfertaController::class,'store']);
Route::get('/oferta/{oferta}/edit', [App\Http\Controllers\OfertaController::class, 'edit'])->name('oferta.edit');
Route::put('/oferta/{oferta}', [App\Http\Controllers\OfertaController::class, 'update'])->name('oferta.update');
Route::delete('/oferta/{oferta}', [App\Http\Controllers\OfertaController::class, 'destroy'])->name('oferta.delete');


Route::get('/carrito',[App\Http\Controllers\CarritoController::class, 'index'])->name('carrito.index');
Route::get('carrito/addCanasta/{item}',[App\Http\Controllers\CarritoController::class, 'addCanasta'])->name('carrito.agregar');
Route::get('carrito/addOferta/{item}',[App\Http\Controllers\CarritoController::class, 'addOferta'])->name('carrito.agregarOferta');
Route::delete('/carrito/delete/{item}', [App\Http\Controllers\CarritoController::class, 'delete'])->name('carrito.delete');
Route::get('/carrito/vaciar', [App\Http\Controllers\CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::put('/carrito/{item}', [App\Http\Controllers\CarritoController::class, 'updateCant'])->name('carrito.updateCant');


