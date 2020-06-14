<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rota raiz da aplicação que exibi a Página Inicial
Route::get('/', function () {
    return view('website.index');
})->name('root');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Rotas para o controle e administração da Autenticação da aplicação.
| O registro de novos usuários está desativado
|
*/
Auth::routes(['register' => false]);

// Rota raiz para a Plataforma de administração da aplicação
Route::get('/admin', 'HomeController@index')->name('home');

// Grupo de rotas para os CRUDs essenciais da aplicação
Route::group(['prefix' => 'admin', "middleware" => ["auth"], 'as' => 'admin.'], function () {
    // Rotas do CRUD de Veículos
    Route::resource('veiculos','VeiculoController');
});
