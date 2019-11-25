<?php

use Illuminate\Http\Response;
use App\Http\Resources\TipoAtividadeCollection;
use App\TipoAtividade;

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

Route::get('/', function () {
    return response()->json(['message' => 'Brinque Coin APIs', 'status' => 'Connected']);
})->name('api.inicio');

Route::get('/tiposatividades', ['uses' => 'Admin\TipoAtividadeController@listar'])->name('api.tiposatividades');
