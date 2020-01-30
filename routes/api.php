<?php

use Illuminate\Http\Response;

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

use App\Model\Mark;

Route::get(
    '/',
    ['user' => 'Site\HomeController@api']
)->name('api.inicio');

Route::post(
    '/atividades/marcar/',
    ['uses' => 'Board\BoardController@markActivity']
)->name('api.activity.mark');
