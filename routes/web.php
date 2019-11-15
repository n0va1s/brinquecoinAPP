<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

Route::get('/login', ['as' => 'site.login', 'uses' => 'Site\LoginController@index']);
Route::get('/login/sair', ['as' => 'site.login.sair', 'uses' => 'Site\LoginController@sair']);
Route::post('/login/entrar', ['as' => 'site.login.entrar', 'uses' => 'Site\LoginController@entrar']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/perfil/{id}', ['as' => 'admin.perfil', 'uses' => 'Admin\PerfilController@index']);
    Route::put('/admin/perfil/atualizar/{id}', ['as' => 'admin.perfil.atualizar', 'uses' => 'Admin\PerfilController@atualizar']);

    Route::get('/admin/quadros', ['as' => 'admin.quadros', 'uses' => 'Admin\QuadroController@index']);
    Route::get('/admin/quadros/adicionar', ['as' => 'admin.quadros.adicionar', 'uses' => 'Admin\QuadroController@adicionar']);
    Route::post('/admin/quadros/salvar', ['as' => 'admin.quadros.salvar', 'uses' => 'Admin\QuadroController@salvar']);
    Route::get('/admin/quadros/editar/{id}', ['as' => 'admin.quadros.editar', 'uses' => 'Admin\QuadroController@editar']);
    Route::put('/admin/quadros/atualizar/{id}', ['as' => 'admin.quadros.atualizar', 'uses' => 'Admin\QuadroController@atualizar']);
    Route::get('/admin/quadros/deletar/{id}', ['as' => 'admin.quadros.deletar', 'uses' => 'Admin\QuadroController@deletar']);

    Route::get('/admin/configuracao/tiposquadros', ['as' => 'admin.configuracao.tiposquadros', 'uses' => 'Admin\TipoQuadroController@index']);
    Route::get('/admin/configuracao/tiposquadros/adicionar', ['as' => 'admin.configuracao.tiposquadros.adicionar', 'uses' => 'Admin\TipoQuadroController@adicionar']);
    Route::post('/admin/configuracao/tiposquadros/salvar', ['as' => 'admin.configuracao.tiposquadros.salvar', 'uses' => 'Admin\TipoQuadroController@salvar']);
    Route::get('/admin/configuracao/tiposquadros/editar/{id}', ['as' => 'admin.configuracao.tiposquadros.editar', 'uses' => 'Admin\TipoQuadroController@editar']);
    Route::put('/admin/configuracao/tiposquadros/atualizar/{id}', ['as' => 'admin.configuracao.tiposquadros.atualizar', 'uses' => 'Admin\TipoQuadroController@atualizar']);
    Route::get('/admin/configuracao/tiposquadros/deletar/{id}', ['as' => 'admin.configuracao.tiposquadros.deletar', 'uses' => 'Admin\TipoQuadroController@deletar']);

    Route::get('/admin/configuracao/tipospropositos', ['as' => 'admin.configuracao.tipospropositos', 'uses' => 'Admin\TipoPropositoController@index']);
    Route::get('/admin/configuracao/tipospropositos/adicionar', ['as' => 'admin.configuracao.tipospropositos.adicionar', 'uses' => 'Admin\TipoPropositoController@adicionar']);
    Route::post('/admin/configuracao/tipospropositos/salvar', ['as' => 'admin.configuracao.tipospropositos.salvar', 'uses' => 'Admin\TipoPropositoController@salvar']);
    Route::get('/admin/configuracao/tipospropositos/editar/{id}', ['as' => 'admin.configuracao.tipospropositos.editar', 'uses' => 'Admin\TipoPropositoController@editar']);
    Route::put('/admin/configuracao/tipospropositos/atualizar/{id}', ['as' => 'admin.configuracao.tipospropositos.atualizar', 'uses' => 'Admin\TipoPropositoController@atualizar']);
    Route::get('/admin/configuracao/tipospropositos/deletar/{id}', ['as' => 'admin.configuracao.tipospropositos.deletar', 'uses' => 'Admin\TipoPropositoController@deletar']);

    Route::get('/admin/configuracao/tiposatividades', ['as' => 'admin.configuracao.tiposatividades', 'uses' => 'Admin\TipoAtividadeController@index']);
    Route::get('/admin/configuracao/tiposatividades/adicionar', ['as' => 'admin.configuracao.tiposatividades.adicionar', 'uses' => 'Admin\TipoAtividadeController@adicionar']);
    Route::post('/admin/configuracao/tiposatividades/salvar', ['as' => 'admin.configuracao.tiposatividades.salvar', 'uses' => 'Admin\TipoAtividadeController@salvar']);
    Route::get('/admin/configuracao/tiposatividades/editar/{id}', ['as' => 'admin.configuracao.tiposatividades.editar', 'uses' => 'Admin\TipoAtividadeController@editar']);
    Route::put('/admin/configuracao/tiposatividades/atualizar/{id}', ['as' => 'admin.configuracao.tiposatividades.atualizar', 'uses' => 'Admin\TipoAtividadeController@atualizar']);
    Route::get('/admin/configuracao/tiposatividades/deletar/{id}', ['as' => 'admin.configuracao.tiposatividades.deletar', 'uses' => 'Admin\TipoAtividadeController@deletar']);
});
