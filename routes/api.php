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

//conjunto de rutas de acciones de mi nube con el usuario autenticado
Route::group(['prefix' => 'mi_nube', 'middleware' => 'auth:api'], function(){
    Route::get('me', function(){
        return response()->json(['status' => 1, 'me' => auth()->user()->email]);
    });
});

//conjunto de rutas de registro
Route::group(['prefix' => 'auth'], function(){
    Route::post('registrarse', 'AuthController@registrarse');
    Route::post('login', 'AuthController@login')->middleware('checkUserEmailVerify');
    Route::post('logout', 'AuthController@logout');
    Route::post('verificacion/{token}', 'VerificacionCorreoController@verificarCorreo')->name('verificar');
});

Route::post('prueba', function(){
    dd(request()->headers->all());
    return response('correcto');
});//->middleware('auth:api');

