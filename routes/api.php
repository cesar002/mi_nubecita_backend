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
Route::group(['prefix' => 'mi_nube'], function(){

});

//conjunto de rutas de registro
Route::group(['prefix' => 'auth'], function(){
    Route::post('registrarse', 'AuthController@registrarse');
    Route::post('login', 'AuthController@login')->middleware('checkUserEmailVerify');
    Route::post('logout', 'AuthController@logout');
    Route::get('verificacion/{token}', 'VerificacionCorreoController@verificarCorreo')->name('verificar');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
