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
Route::get(
    '/status',
    ['uses' => 'Api\StatusController@index']
);

Route::post(
    '/atividades/marcar',
    ['uses' => 'Api\MarkActivityController@mark']
);

Route::get(
    '/tokens',
    ['uses' => 'Api\ApiTokenController@update']
);

Route::get(
    '/user',
    ['uses' => 'Api\ApiTokenController@user']
);

Route::middleware('auth:api')->get(
    '/test',
    function (Request $request) {
        return $request->user();
    }
);
