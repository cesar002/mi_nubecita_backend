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
    // Route::post('files/uploadFiles');
    // Route::post();

    //rutas de subidas y descargas de archivos
    Route::group(['prefix' => 'store'], function () {
        Route::post('upload', 'ArchivosController@uploadFiles')->middleware('cors');
    });
});

//conjunto de rutas de registro
Route::group(['prefix' => 'auth'], function(){
    Route::post('registrarse', 'AuthController@registrarse');
    Route::post('login', 'AuthController@login')->middleware('checkUserEmailVerify');
    Route::post('logout', 'AuthController@logout');
    Route::get('verificacion/{token}', 'VerificacionCorreoController@verificarCorreo');
    Route::post('recuperarPassword/{token}', 'RecuperacionPassword@validarToken');
    Route::post('recuperarPassword', 'RecuperacionPassword@registrarTokenRecuperacion');
});

// Route::group(['prefix' => 'pruebas'], function(){
//     Route::get('wea', function () {
//         return response('prueba 1');
//     });
//     Route::group(['prefix' => 'evo'], function () {
//         Route::get('ovo', function () {
//             return response('obo uwu');
//         });
//     });
// });//->middleware('auth:api');

