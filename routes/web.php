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

Route::prefix('login')->group(
    function () {
        Route::get(
            '/',
            ['uses' => 'Site\LoginController@index']
        )->name('site.login');
        Route::get(
            '/sair',
            ['uses' => 'Site\LoginController@signout']
        )->name('site.login.signout');
        Route::post(
            '/entrar',
            ['uses' => 'Site\LoginController@signin']
        )->name('site.login.signin');
    }
);

Route::middleware(['auth'])->group(
    function () {
        Route::prefix('perfil')->group(
            function () {
                Route::get(
                    '/editar/{id}',
                    ['uses' => 'Admin\ProfileController@edit']
                )->name('profile.edit');
                Route::put(
                    '/atualizar/{id}',
                    ['uses' => 'Admin\ProfileController@update']
                )->name('profile.update');
            }
        );
        Route::prefix('quadros')->group(
            function () {
                Route::get(
                    '/',
                    ['uses' => 'Board\BoardController@index']
                )->name('board.index');
                Route::get(
                    '/mesada',
                    ['uses' => 'Board\AllowanceController@create']
                )->name('board.allowance.create');
                Route::post(
                    '/mesada/salvar',
                    ['uses' => 'Board\AllowanceController@store']
                )->name('board.allowance.save');
                Route::get(
                    '/mesada/editar/{codigo}',
                    ['uses' => 'Board\AllowanceController@edit']
                )->name('board.allowance.edit');
                Route::put(
                    '/mesada/atualizar/{codigo}',
                    ['uses' => 'Board\AllowanceController@update']
                )->name('board.allowance.store');
                Route::get(
                    '/mesada/deletar/{codigo}',
                    ['uses' => 'Board\AllowanceController@destroy']
                )->name('board.allowance.delete');
                Route::get(
                    '/mesada/exibir/{codigo}',
                    ['uses' => 'Board\AllowanceController@show']
                )->name('board.allowance.show');
                Route::get(
                    '/habito',
                    ['uses' => 'Board\HabitController@create']
                )->name('board.habit.create');
                Route::get(
                    '/tarefa',
                    ['uses' => 'Board\TaskController@create']
                )->name('board.task.create');
                Route::get(
                    '/ferias',
                    ['uses' => 'Board\VacationController@create']
                )->name('board.vacation.create');


                Route::post(
                    '/mesada/atividades/salvar',
                    ['uses' => 'Admin\AtividadeController@store']
                )->name('activity.save');
                Route::get(
                    '/mesada/atividades/deletar/{codigo}',
                    ['uses' => 'Admin\AtividadeController@destroy']
                )->name('activity.delete');

                Route::post(
                    '/mesada/atividades/adicionar/nova',
                    ['uses' => 'Admin\AtividadeController@createNew']
                )->name('activity.user.save');
                Route::get(
                    '/mesada/atividades/deletar/nova/{id}',
                    ['uses' => 'Admin\AtividadeController@destroyNew']
                )->name('activity.user.delete');
            }
        );
        Route::prefix('capsula')->group(
            function () {
                Route::get(
                    '/',
                    ['uses' => 'Admin\CapsuleController@index']
                )->name('capsule.index');
                Route::get(
                    '/adicionar',
                    ['uses' => 'Admin\CapsuleController@create']
                )->name('capsule.create');
                Route::post(
                    '/salvar',
                    ['uses' => 'Admin\CapsuleController@store']
                )->name('capsule.store');
                Route::get(
                    '/deletar/{codigo}',
                    ['uses' => 'Admin\CapsuleController@destroy']
                )->name('capsule.delete');
            }
        );
        Route::prefix('configuracao')->group(
            function () {
                Route::get(
                    '/tiposquadros',
                    ['uses' => 'Admin\TipoQuadroController@index']
                )->name('board.type.index');
                Route::get(
                    '/tiposquadros/adicionar',
                    ['uses' => 'Admin\TipoQuadroController@create']
                )->name('board.type.create');
                Route::post(
                    '/tiposquadros/salvar',
                    ['uses' => 'Admin\TipoQuadroController@store']
                )->name('board.type.store');
                Route::get(
                    '/tiposquadros/editar/{id}',
                    ['uses' => 'Admin\TipoQuadroController@edit']
                )->name('board.type.edit');
                Route::put(
                    '/tiposquadros/atualizar/{id}',
                    ['uses' => 'Admin\TipoQuadroController@update']
                )->name('board.type.update');
                Route::get(
                    '/tiposquadros/deletar/{id}',
                    ['uses' => 'Admin\TipoQuadroController@destroy']
                )->name('board.type.delete');

                Route::get(
                    '/tipospropositos',
                    ['uses' => 'Admin\TipoPropositoController@index']
                )->name('propouse.type.index');
                Route::get(
                    '/tipospropositos/adicionar',
                    ['uses' => 'Admin\TipoPropositoCeontroller@create']
                )->name('propouse.type.create');
                Route::post(
                    '/tipospropositos/salvar',
                    ['uses' => 'Admin\TipoPropositoController@store']
                )->name('propouse.type.store');
                Route::get(
                    '/tipospropositos/editar/{id}',
                    ['uses' => 'Admin\TipoPropositoController@edit']
                )->name('propouse.type.edit');
                Route::put(
                    '/tipospropositos/atualizar/{id}',
                    ['uses' => 'Admin\TipoPropositoController@update']
                )->name('propouse.type.update');
                Route::get(
                    '/tipospropositos/deletar/{id}',
                    ['uses' => 'Admin\TipoPropositoController@delete']
                )->name('propouse.type.delete');

                Route::get(
                    '/tiposatividades',
                    ['uses' => 'Admin\TipoAtividadeController@index']
                )->name('activity.type.index');
                Route::get(
                    '/tiposatividades/adicionar',
                    ['uses' => 'Admin\TipoAtividadeController@create']
                )->name('activity.type.create');
                Route::post(
                    '/tiposatividades/salvar',
                    ['uses' => 'Admin\TipoAtividadeController@store']
                )->name('activity.type.store');
                Route::get(
                    '/tiposatividades/editar/{id}',
                    ['uses' => 'Admin\TipoAtividadeController@edit']
                )->name('activity.type.edit');
                Route::put(
                    '/tiposatividades/atualizar/{id}',
                    ['uses' => 'Admin\TipoAtividadeController@update']
                )->name('activity.type.update');
                Route::get(
                    '/tiposatividades/deletar/{id}',
                    ['uses' => 'Admin\TipoAtividadeController@delete']
                )->name('activity.type.delete');
            }
        );
    }
);
