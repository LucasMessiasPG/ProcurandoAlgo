<?php

Route::post('/api/pessoa',function(\Illuminate\Http\Request $request){
    return [
      ['id_produto'=>'10','nome'=>'ProcurandoAlgo','id_departamento'=>'1','valor'=>'100.00'],
      ['id_produto'=>'22','nome'=>'ProcurandoAlgo2','id_departamento'=>'2','valor'=>'123.00']
    ];
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

