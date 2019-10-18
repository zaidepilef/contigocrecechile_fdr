<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Agregamos nuestra ruta al controller de Period
/* Route::resource('Period', 'api\periods\PeriodController');
 */
Route::get('getPeriodos', 'api\ApiController@getPeriodos')->name('getPeriodos');

Route::get('getContenido', 'api\ApiController@getContenido')->name('getContenido');

Route::get('validaUsuario/{email}', 'api\ApiController@validaUsuario')->name('validaUsuario');
/* Route::get('validaUsuario/{email}/{password}', 'api\ApiController@validaUsuario'); */

Route::post('addUsuario', 'api\ApiController@addUsuario')->name('addUsuario');

Route::post('create', 'api\ApiController@create')->name('create');

Route::middleware('auth:api')->get('/testing', function (Request $request) {
    return $request->user();
});
