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



Route::get('reg_pessoa_perdida', function () {
    return view('regPessoaPerdida');
});
Route::get('dados/dados', function () {
    return view('regPessoaPerdida_fase2');
});

Route::get('ver_pessoa_perdida', 'pessoaPerdidaController@fase2');

Route::get('meus_registos/{id}', 'pessoaPerdidaController@meus_registos');

Route::get('desaparecidos','frontController@index');

Route::get('filtrar','frontController@filtrar');

Route::get('filtrar_casos/{chave}/{valor}','pessoaPerdidaController@filtrar_casos');

Route::get('filtrar_por_provincia/{chave}/{valor}','pessoaPerdidaController@filtrar_casos');

Route::get('filtrar_entre/{chave1}/{chave2}','pessoaPerdidaController@filtrar_entre');

Route::get('perfil/{id}','utilizadorController@show');

Route::get('desaparecidos_centros','frontController@desaparecidos_centros');

Route::get('detalhes/{idpessoa_perdida}','comentariosController@show');

Route::get('detalhees/{idpessoa_perdida}','comentariosController@shoow');

Route::get('apagar/{idcomentario}/{idpessoa_perdida}','comentariosController@destroy');

Route::get('desfecho/{idpessoa_perdida}','pessoaPerdidaController@update');

Route::get('activar/{idpessoa_perdida}','pessoaPerdidaController@activar');

Route::get('/apagar/{idpessoa_perdida}/{iduser}','pessoaPerdidaController@destroy');

Route::get('pessoas_encontradas','frontController@encontradas');

Route::apiResources(['registar'=>'pessoaPerdidaController']);

Route::apiResources(['fase2reg'=>'frontController']);

Route::apiResources(['comentar'=>'comentariosController']);

Auth::routes();

Route::get('/','frontOfficeController@index');

/*Route::get('/enviar', function(){
    Mail::send('mail.corpo', ['curso' => 'Eloquent'], function($m){
        $m->from('edsongomex@gmail.com', 'Edson Gomes');
        $m->subject('Desfecho do caso');
        $m->to('mariesexshopp@gmail.com');
    });
});
*/
Route::get('mapa','API\testeController@index');

Route::post('dados','API\pessoaPerdidaController@fase2');

Route::apiResources(['registarUser'=> 'API\userNormalController']);

//Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', function (){
        if(Auth::user()->tipo == "Normal") {
            return redirect(url("/desaparecidos"));
        }
        if(Auth::user()->tipo == "Gestor" || Auth::user()->tipo == "Admin") {
            return view('home');
        }
    });
});
