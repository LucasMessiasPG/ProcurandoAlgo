<?php

Route::post('/api/pessoa',function(\Illuminate\Http\Request $request){
    return [
      ['id_produto'=>'10','nome'=>'ProcurandoAlgo','id_departamento'=>'1','valor'=>'100.00'],
      ['id_produto'=>'22','nome'=>'ProcurandoAlgo2','id_departamento'=>'2','valor'=>'123.00']
    ];
});

Route::get('/',function(){
   return \Hash::make('123456');
});

Route::post('login','AdminController@login');
Route::post('register','AdminController@register');

//Rotas protegidas por Basic
Route::group(['middleware' => ['ws']], function () {
    Route::group(['prefix'=>'usuario'], function(){
        Route::post('/','UsuarioController@filter');
        Route::post('create','UsuarioController@create');
//        Route::post('update','UsuarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
    Route::group(['prefix'=>'departamento'], function(){
        Route::post('/','DepartamentoController@filter');
    });
    Route::group(['prefix'=>'pedido'], function(){
        Route::post('create','UsuarioController@create');
        Route::post('update','UsuarioController@update');
        Route::get('delete/{id}','UsuarioController@destroy');
    });
    Route::group(['prefix'=>'comentario'], function(){
        Route::post('/','ComentarioController@filter');
        Route::post('create','ComentarioController@create');
        Route::post('update','ComentarioController@update');
        Route::get('delete/{id}','ComentarioController@destroy');
    });

    Route::post('busca','PesquisaController@filter');
    Route::post('destaque','PesquisaController@filterDestaque');
    Route::post('promocao','PesquisaController@filterPromocao');
    Route::post('produto','PesquisaController@filterProduto');


    Route::post('transaction','FinanceiroController@transaction');
});

Route::group(['prefix'=>'asset'],function(){
    Route::get('img/{id_produto}/1',function($id_produto){
        return response(file_get_contents(storage_path('app/img/'.$id_produto.'/1.jpg')),200)->header('Content-Type', 'image/png');
    });
});

//Rotas protegidas por Auth
Route::group(['middleware' => ['web']], function () {
    //Route::get('/teste',function(){echo 'teste';});
});

