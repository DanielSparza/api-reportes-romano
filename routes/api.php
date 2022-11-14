<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//----------------------------------MÓDULO ADMINISTRADOR-----------------------------------------------
//CIUDADES 
Route::get('/roles', 'App\Http\Controllers\RolController@index'); //MOSTRAR ROLES

//USUARIOS
Route::get('/usuarios', 'App\Http\Controllers\UserController@index'); //MOSTRAR USUARIOS
Route::post('/usuarios', 'App\Http\Controllers\UserController@store'); //GUARDAR USUARIOS
Route::put('/actualizar-usuario/{clave_persona}', 'App\Http\Controllers\UserController@update'); //ACTUALIZAR USUARIOS

//CLIENTES
Route::get('/clientes', 'App\Http\Controllers\ClienteController@index'); //MOSTRAR CLIENTES
Route::post('/clientes', 'App\Http\Controllers\ClienteController@store'); //GUARDAR CLIENTES
Route::put('/actualizar-cliente/{clave_persona}', 'App\Http\Controllers\ClienteController@update'); //ACTUALIZAR CLIENTES

//CIUDADES 
Route::get('/ciudades', 'App\Http\Controllers\CiudadController@index'); //MOSTRAR CIUDADES
Route::post('/ciudades', 'App\Http\Controllers\CiudadController@store'); //GUARDAR CIUDADES
Route::put('/actualizar-ciudad/{clave_ciudad}', 'App\Http\Controllers\CiudadController@update'); //ACTUALIZAR CIUDADES

//COMUNIDADES
Route::get('/comunidades', 'App\Http\Controllers\ComunidadController@index'); //MOSTRAR COMUNIDADES
Route::get('/comunidades-ciudad/{clave_ciudad}', 'App\Http\Controllers\ComunidadController@show'); //MOSTRAR COMUNIDADES
Route::post('/comunidades', 'App\Http\Controllers\ComunidadController@store'); //GUARDAR COMUNIDADES
Route::put('/actualizar-comunidad/{clave_comunidad}', 'App\Http\Controllers\ComunidadController@update'); //ACTUALIZAR COMUNIDADES

//PAQUETES DE INTERNET 
Route::get('/paquetes-internet', 'App\Http\Controllers\PaquetesinternetController@index'); //MOSTRAR REGISTROS
Route::post('/paquetes-internet', 'App\Http\Controllers\PaquetesinternetController@store'); //GUARDAR REGISTROS
Route::put('/actualizar-paquete/{clave_paquete}', 'App\Http\Controllers\PaquetesinternetController@update'); //ACTUALIZAR REGISTROS

//DATOS EMPRESA
Route::get('/datos-empresa', 'App\Http\Controllers\DatosempresaController@index'); //MOSTRAR REGISTROS
Route::put('/actualizar-datos-cabecera/{clave_empresa}', 'App\Http\Controllers\DatosempresaController@updateCabecera'); //ACTUALIZAR REGISTROS
Route::put('/actualizar-datos-nosotros/{clave_empresa}', 'App\Http\Controllers\DatosempresaController@updateNosotros'); //ACTUALIZAR REGISTROS
Route::put('/actualizar-datos-contacto/{clave_empresa}', 'App\Http\Controllers\DatosempresaController@updateContacto'); //ACTUALIZAR REGISTROS

//REPORTES
Route::post('/levantar-reporte', 'App\Http\Controllers\ReporteController@store'); //REGISTRAR REPORTE 
Route::get('/historial-reportes/{fecha_filtro}/estatus/{estatus}', 'App\Http\Controllers\ReporteController@show'); //MOSTRAR REPORTES
Route::put('/historial-reportes-editar/{clave_reporte}', 'App\Http\Controllers\ReporteController@updateProblema'); //EDITAR PROBLEMA REPORTES
Route::put('/historial-reportes-aumentar/{clave_reporte}', 'App\Http\Controllers\ReporteController@updateVeces'); //EDITAR PROBLEMA REPORTES
Route::get('/reportes-pendientes', 'App\Http\Controllers\ReporteController@index'); //MOSTRAR REPORTES PENDIENTES
Route::get('/reportes-pendientes/{ciudad}/comunidad/{comunidad}', 'App\Http\Controllers\ReporteController@showPendientes'); //MOSTRAR REPORTES PENDIENTES
