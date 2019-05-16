<?php

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
    return view('auth/login');
});
Auth::routes();

Route::resource('aprobador/procesos','ProcesoController');
Route::resource('aprobador/usuarios','UsuarioController');
Route::resource('aprobador/movimientos','MovimientoController');
Route::resource('solicitante/solicitud','SolicitudController');
Route::resource('solicitante/diligenciar','SolicitudController');
Route::resource('solicitante/finalizar','SolicitudController');
Route::resource('solicitante/procesos','SolicitudController');
//Route::get('solicitante/solicitud/{proceso}','ProcesoController@procesoUsuario');

