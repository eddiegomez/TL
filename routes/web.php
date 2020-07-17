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
    return view('form_reg_pessoa_perdida');
});

Route::get('ver_pessoa_perdida', function () {
    return view('casos_pessoa_perdida');
});
/*
Route::get('/', function () {
    return view('map');
});*/
Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/','frontOfficeController@index');

Route::get('/enviar', function(){
    Mail::send('mail.corpo', ['curso' => 'Eloquent'], function($m){
        $m->from('edsongomex@gmail.c om', 'Edson Gomes');
        $m->to('hilariogomes16@gmail.com');
    });
});

Route::get('mapa','API\testeController@index');

Route::apiResources(['registarUser'=> 'API\userNormalController']);

Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');
