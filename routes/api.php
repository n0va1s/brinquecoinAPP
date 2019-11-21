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

Route::get('/', ['as' => 'api.inicio'], function (){
    return response()->json(['message' => 'Brinque Coin APIs', 'status' => 'Connected']);
});
Route::get('/atividades', ['as' => 'api.atividades', 'uses' => 'Admin\TipoAtividadeController@listar']);
