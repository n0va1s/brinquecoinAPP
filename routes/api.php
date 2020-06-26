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
Route::get(
    '/',
    ['uses' => 'Site\HomeController@api']
)->name('api.inicio');

Route::middleware('auth:api')
    ->post(
        '/atividades/marcar',
        ['uses' => 'Api\MarkActivityController@mark']
    )
    ->name('api.activity.mark');
