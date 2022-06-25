<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//existem outras formas de declarar uma rota
Route::get('/users', [UserController::class, 'index'])->name('users.index');

//rota para edicao
Route::get('/users/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}',[UserController::class, 'update'])->name('users.update');

Route::get('/delete/{id}', [UserController::class , 'destroy'])->name('delete.destroy');

//usando esse formato de rota, o create deve vir antes do listar(user.show), pois foi declarado na rota abaixo que tudo que vier depois de user que nao seja um id valida vai para a pagina de listar
Route::get('/users/create',[UserController::class, 'create'])->name('users.create');
Route::post('/users',[UserController::class, 'createAction'])->name('users.createAction');

//rota com parametros. Nesse caso é rota para exeibir os detalhes do usuario
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


