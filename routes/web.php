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
Route::get('/', 'HomeController@index')->name('root');

Route::get('veiculo/{id}', 'VeiculoController@show')->name('show_veiculo');

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
Route::get('/admin', 'Cms\AdminController@index')->name('admin');

// Redimensionamento dinâmico de imagem
// exemplo.com/resize/<base64dir>&<largura>&<altura>&<imagem.ext>
Route::get('resize/{parameters}', 'Resize\ResizeImageController@show');

// Grupo de rotas para os CRUDs essenciais da aplicação
Route::group(['prefix' => 'admin', "middleware" => ["auth"], 'as' => 'admin.'], function () {
    // Rotas do CRUD de Veículos
    Route::resource('veiculos','Cms\VeiculoController');
    // Rotas do CRUD do Carousel
    Route::resource('carousel','Cms\CarouselController');
});
