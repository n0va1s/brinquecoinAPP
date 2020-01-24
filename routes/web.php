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
Route::get('/send', ['uses' => 'Site\HomeController@send'])->name('site.mail');

/*
get('login', 'Auth\LoginController@showLoginForm')->name('login');
post('login', 'Auth\LoginController@login');
post('logout', 'Auth\LoginController@logout')->name('logout');
get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
post('register', 'Auth\RegisterController@register');
get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
*/
Auth::routes(['verify' => true]);
/*
By default logout its a POST method
This rewrite to GET method
*/
Route::get('logout', 'Auth\LoginController@logout');

Route::middleware(['auth'])->group(
    function () {
        Route::prefix('perfil')->group(
            function () {
                Route::get(
                    '/editar',
                    ['uses' => 'Admin\ProfileController@edit']
                )->name('profile.edit');
                Route::put(
                    '/atualizar',
                    ['uses' => 'Admin\ProfileController@update']
                )->name('profile.update');
                Route::get(
                    '/deletar',
                    ['uses' => 'Admin\ProfileController@destroy']
                )->name('profile.destroy');
            }
        );
        Route::prefix('quadros')->group(
            function () {
                Route::get(
                    '/',
                    ['uses' => 'Board\BoardController@index']
                )->name('board.index');
                Route::get(
                    '/exibir/{codigo}',
                    ['uses' => 'Board\BoardController@show']
                )->name('board.show');
                Route::get(
                    '/duplicar/{codigo}',
                    ['uses' => 'Board\BoardController@copy']
                )->name('board.copy');
                Route::get(
                    '/fechar/{codigo}',
                    ['uses' => 'Board\BoardController@close']
                )->name('board.close');

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
                )->name('board.allowance.update');
                Route::get(
                    '/mesada/deletar/{codigo}',
                    ['uses' => 'Board\AllowanceController@destroy']
                )->name('board.allowance.delete');

                Route::get(
                    '/habito',
                    ['uses' => 'Board\HabitController@create']
                )->name('board.habit.create');
                Route::post(
                    '/habito/salvar',
                    ['uses' => 'Board\HabitController@store']
                )->name('board.habit.save');
                Route::get(
                    '/habito/editar/{codigo}',
                    ['uses' => 'Board\HabitController@edit']
                )->name('board.habit.edit');
                Route::put(
                    '/habito/atualizar/{codigo}',
                    ['uses' => 'Board\HabitController@update']
                )->name('board.habit.update');
                Route::get(
                    '/habito/deletar/{codigo}',
                    ['uses' => 'Board\HabitController@destroy']
                )->name('board.habit.delete');

                Route::get(
                    '/tarefa',
                    ['uses' => 'Board\TaskController@create']
                )->name('board.task.create');
                Route::post(
                    '/tarefa/salvar',
                    ['uses' => 'Board\TaskController@store']
                )->name('board.task.save');
                Route::get(
                    '/tarefa/editar/{codigo}',
                    ['uses' => 'Board\TaskController@edit']
                )->name('board.task.edit');
                Route::put(
                    '/tarefa/atualizar/{codigo}',
                    ['uses' => 'Board\TaskController@update']
                )->name('board.task.update');
                Route::get(
                    '/tarefa/deletar/{codigo}',
                    ['uses' => 'Board\TaskController@destroy']
                )->name('board.task.delete');

                Route::post(
                    '/mesada/atividades/salvar',
                    ['uses' => 'Board\BoardController@storeActivity']
                )->name('board.activity.save');
                Route::get(
                    '/mesada/atividades/deletar/{codigo}',
                    ['uses' => 'Board\BoardController@destroyActivity']
                )->name('board.activity.delete');

                Route::post(
                    '/mesada/atividades/salvar/nova',
                    ['uses' => 'Board\BoardController@storeActivityType']
                )->name('board.activity.type.save');
                Route::get(
                    '/mesada/atividades/deletar/nova/{id}',
                    ['uses' => 'Board\BoardController@destroyActivityType']
                )->name('board.activity.type.delete');
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
                )->name('capsule.destroy');
            }
        );
        Route::prefix('configuracao')->group(
            function () {
                Route::get(
                    '/tiposquadros',
                    ['uses' => 'Admin\BoardTypeController@index']
                )->name('board.type.index');
                Route::get(
                    '/tiposquadros/adicionar',
                    ['uses' => 'Admin\BoardTypeController@create']
                )->name('board.type.create');
                Route::post(
                    '/tiposquadros/salvar',
                    ['uses' => 'Admin\BoardTypeController@store']
                )->name('board.type.store');
                Route::get(
                    '/tiposquadros/editar/{id}',
                    ['uses' => 'Admin\BoardTypeController@edit']
                )->name('board.type.edit');
                Route::put(
                    '/tiposquadros/atualizar/{id}',
                    ['uses' => 'Admin\BoardTypeController@update']
                )->name('board.type.update');
                Route::get(
                    '/tiposquadros/deletar/{id}',
                    ['uses' => 'Admin\BoardTypeController@destroy']
                )->name('board.type.delete');

                Route::get(
                    '/tipospropositos',
                    ['uses' => 'Admin\PropouseTypeController@index']
                )->name('propouse.type.index');
                Route::get(
                    '/tipospropositos/adicionar',
                    ['uses' => 'Admin\PropouseTypeController@create']
                )->name('propouse.type.create');
                Route::post(
                    '/tipospropositos/salvar',
                    ['uses' => 'Admin\PropouseTypeController@store']
                )->name('propouse.type.store');
                Route::get(
                    '/tipospropositos/editar/{id}',
                    ['uses' => 'Admin\PropouseTypeController@edit']
                )->name('propouse.type.edit');
                Route::put(
                    '/tipospropositos/atualizar/{id}',
                    ['uses' => 'Admin\PropouseTypeController@update']
                )->name('propouse.type.update');
                Route::get(
                    '/tipospropositos/deletar/{id}',
                    ['uses' => 'Admin\PropouseTypeController@delete']
                )->name('propouse.type.delete');

                Route::get(
                    '/tiposatividades',
                    ['uses' => 'Admin\ActivityTypeController@index']
                )->name('activity.type.index');
                Route::get(
                    '/tiposatividades/adicionar',
                    ['uses' => 'Admin\ActivityTypeController@create']
                )->name('activity.type.create');
                Route::post(
                    '/tiposatividades/salvar',
                    ['uses' => 'Admin\ActivityTypeController@store']
                )->name('activity.type.store');
                Route::get(
                    '/tiposatividades/editar/{id}',
                    ['uses' => 'Admin\ActivityTypeController@edit']
                )->name('activity.type.edit');
                Route::put(
                    '/tiposatividades/atualizar/{id}',
                    ['uses' => 'Admin\ActivityTypeController@update']
                )->name('activity.type.update');
                Route::get(
                    '/tiposatividades/deletar/{id}',
                    ['uses' => 'Admin\ActivityTypeController@delete']
                )->name('activity.type.delete');
            }
        );
    }
);

