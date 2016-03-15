<?php

Route::get('/api/pessoa',function(){
    return ['name'=>'ProcurandoAlgo','id'=>'1'];
});

Route::post('login','AdminController@login');

//Rotas protegidas por Basic
Route::group(['middleware' => ['ws']], function () {
    Route::group(['prefix'=>'usuario'], function(){
        Route::post('/','UsuarioController@filter');
        Route::post('create','UsuarioController@create');
        Route::post('update','Usuphp aarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
    Route::group(['prefix'=>'departamento'], function(){
        Route::post('/','DepartamentoController@filter');
        Route::post('create','UsuarioController@create');
        Route::post('update','UsuarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
    Route::group(['prefix'=>'pedido'], function(){
        Route::post('/','DepartamentoController@filter');
        Route::post('create','UsuarioController@create');
        Route::post('update','UsuarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
});

//Rotas protegidas por Auth
Route::group(['middleware' => ['web']], function () {
    //Route::get('/teste',function(){echo 'teste';});
});

