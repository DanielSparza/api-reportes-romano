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

Route::get('/paquetes-internet', 'App\Http\Controllers\PaquetesinternetController@index'); //MOSTRAR REGISTROS
Route::post('/paquetes-internet', 'App\Http\Controllers\PaquetesinternetController@store'); //GUARDAR REGISTROS
Route::put('/actualizar-paquete/{clave_paquete}', 'App\Http\Controllers\PaquetesinternetController@update'); //ACTUALIZAR REGISTROS