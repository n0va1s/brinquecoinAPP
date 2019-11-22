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


Route::get('/', ['uses' => 'Site\HomeController@index'])->name('site.home');

Route::prefix('login')->group(function () {
    Route::get('/', ['uses' => 'Site\LoginController@index'])->name('site.login');
    Route::get('/sair', ['uses' => 'Site\LoginController@sair'])->name('site.login.sair');
    Route::post('/entrar', ['uses' => 'Site\LoginController@entrar'])->name('site.login.entrar');
});


Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/perfil/{id}', ['uses' => 'Admin\PerfilController@index'])->name('admin.perfil');
        Route::put('/perfil/atualizar/{id}', ['uses' => 'Admin\PerfilController@atualizar'])->name('admin.perfil.atualizar');

        Route::get('/quadros', ['uses' => 'Admin\QuadroController@index'])->name('admin.quadros');
        Route::get('/quadros/adicionar', ['uses' => 'Admin\QuadroController@adicionar'])->name('admin.quadros.adicionar');
        Route::post('/quadros/salvar', ['uses' => 'Admin\QuadroController@salvar'])->name('admin.quadros.salvar');
        Route::get('/quadros/editar/{id}', ['uses' => 'Admin\QuadroController@editar'])->name('admin.quadros.editar');
        Route::put('/quadros/atualizar/{id}', ['uses' => 'Admin\QuadroController@atualizar'])->name('admin.quadros.atualizar');
        Route::get('/quadros/deletar/{id}', ['uses' => 'Admin\QuadroController@deletar'])->name('admin.quadros.deletar');
        Route::get('/quadros/exibir/{id}', ['uses' => 'Admin\QuadroController@exibir'])->name('admin.quadros.exibir');

        Route::get('/capsula', ['uses' => 'Admin\CapsulaController@index'])->name('admin.capsula');
        Route::get('/capsula/adicionar', ['uses' => 'Admin\CapsulaController@adicionar'])->name('admin.capsula.adicionar');
        Route::post('/capsula/salvar', ['uses' => 'Admin\CapsulaController@salvar'])->name('admin.capsula.salvar');
        Route::get('/capsula/deletar/{codigo}', ['uses' => 'Admin\CapsulaController@deletar'])->name('admin.capsula.deletar');

        Route::get('/configuracao/tiposquadros', ['uses' => 'Admin\TipoQuadroController@index'])->name('admin.configuracao.tiposquadros');
        Route::get('/configuracao/tiposquadros/adicionar', ['uses' => 'Admin\TipoQuadroController@adicionar'])->name('admin.configuracao.tiposquadros.adicionar');
        Route::post('/configuracao/tiposquadros/salvar', ['uses' => 'Admin\TipoQuadroController@salvar'])->name('admin.configuracao.tiposquadros.salvar');
        Route::get('/configuracao/tiposquadros/editar/{id}', ['uses' => 'Admin\TipoQuadroController@editar'])->name('admin.configuracao.tiposquadros.editar');
        Route::put('/configuracao/tiposquadros/atualizar/{id}', ['uses' => 'Admin\TipoQuadroController@atualizar'])->name('admin.configuracao.tiposquadros.atualizar');
        Route::get('/configuracao/tiposquadros/deletar/{id}', ['uses' => 'Admin\TipoQuadroController@deletar'])->name('admin.configuracao.tiposquadros.deletar');

        Route::get('/configuracao/tipospropositos', ['uses' => 'Admin\TipoPropositoController@index'])->name('admin.configuracao.tipospropositos');
        Route::get('/configuracao/tipospropositos/adicionar', ['uses' => 'Admin\TipoPropositoController@adicionar'])->name('admin.configuracao.tipospropositos.adicionar');
        Route::post('/configuracao/tipospropositos/salvar', ['uses' => 'Admin\TipoPropositoController@salvar'])->name('admin.configuracao.tipospropositos.salvar');
        Route::get('/configuracao/tipospropositos/editar/{id}', ['uses' => 'Admin\TipoPropositoController@editar'])->name('admin.configuracao.tipospropositos.editar');
        Route::put('/configuracao/tipospropositos/atualizar/{id}', ['uses' => 'Admin\TipoPropositoController@atualizar'])->name('admin.configuracao.tipospropositos.atualizar');
        Route::get('/configuracao/tipospropositos/deletar/{id}', ['uses' => 'Admin\TipoPropositoController@deletar'])->name('admin.configuracao.tipospropositos.deletar');

        Route::get('/configuracao/tiposatividades', ['uses' => 'Admin\TipoAtividadeController@index'])->name('admin.configuracao.tiposatividades');
        Route::get('/configuracao/tiposatividades/adicionar', ['uses' => 'Admin\TipoAtividadeController@adicionar'])->name('admin.configuracao.tiposatividades.adicionar');
        Route::post('/configuracao/tiposatividades/salvar', ['uses' => 'Admin\TipoAtividadeController@salvar'])->name('admin.configuracao.tiposatividades.salvar');
        Route::get('/configuracao/tiposatividades/editar/{id}', ['uses' => 'Admin\TipoAtividadeController@editar'])->name('admin.configuracao.tiposatividades.editar');
        Route::put('/configuracao/tiposatividades/atualizar/{id}', ['uses' => 'Admin\TipoAtividadeController@atualizar'])->name('admin.configuracao.tiposatividades.atualizar');
        Route::get('/configuracao/tiposatividades/deletar/{id}', ['uses' => 'Admin\TipoAtividadeController@deletar'])->name('admin.configuracao.tiposatividades.deletar');
    });
});
