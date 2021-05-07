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

Route::apiResources(['pessoa_perdida'=> 'API\pessoaPerdidaController']);
Route::apiResources(['pesquisa'=> 'API\PesquisaController']);
Route::apiResources(['foto'=> 'API\fotoController']);
Route::apiResources(['caso'=> 'API\casoController']);
Route::apiResources(['dash'=> 'API\dashController']);
Route::apiResources(['gestor'=> 'API\gestorController']);
Route::apiResources(['centro'=> 'API\centroController']);
Route::apiResources(['regPessoa_perdida'=> 'API\UserPessoaPerdidaController']);
Route::apiResources(['chart'=> 'API\chartController']);

Route::get('dash_gestor', 'API\dashController@gestor');
Route::get('chartGestor', 'API\chartController@indexGestor');
Route::get('profile', 'API\UserController@profile');
Route::get('find', 'API\pessoaPerdidaController@search');
Route::get('tipo_centro', 'API\centroController@buscarTipos');

