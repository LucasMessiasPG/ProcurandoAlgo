<?php

Route::post('login','AdminCOntroller@login');

//Rotas protegidas por Basic
Route::group(['middleware' => ['ws']], function () {
    Route::group(['prefix'=>'usuario'], function(){
        Route::post('/','UsuarioController@filter');
        Route::post('create','UsuarioController@create');
        Route::post('update','UsuarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
});

//Rotas protegidas por Auth
Route::group(['middleware' => ['web']], function () {

});

