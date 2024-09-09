<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'usuario', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', ['as'=>'usuario', 'uses'=>"\App\Http\Controllers\usuarioController@index"]);
    Route::get('create', ['as'=>'usuario.create', 'uses'=>"\App\Http\Controllers\usuarioController@create"]);
    Route::post('store', ['as'=>'usuario.store', 'uses'=>"\App\Http\Controllers\usuarioController@store"]);
    Route::get('{id}/destroy', ['as'=>'usuario.destroy', 'uses'=>"\App\Http\Controllers\usuarioController@destroy"]);
    Route::get('{id}/edit', ['as'=>'usuario.edit', 'uses'=>"\App\Http\Controllers\usuarioController@edit"]);
    Route::put('{id}/update', ['as'=>'usuario.update', 'uses'=>"\App\Http\Controllers\usuarioController@update"]);
    Route::get('exportacao', ['as'=>'usuario.exportacao', 'uses'=>"\App\Http\Controllers\usuarioController@exportacao"]);
});
