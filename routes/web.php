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

// Rota para pesquisar por filtro
Route::get('/search', 'HomeController@search')->name('search');

// Rota para mostrar informações de um veículo
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
    // Rotas do CRUD dos Veículos
    Route::resource('veiculos','Cms\VeiculoController');
    // Rotas do CRUD do Carousel
    Route::resource('carousel','Cms\CarouselController');
    // Rotas do CRUD das Páginas
    Route::resource('paginas','Cms\PaginaController');
    // Rota para importar os dados da ItCar
    Route::get('sincronizar', 'Cms\ImportController@sincronizar')->name('sincronizar');
});

// Rota para mostrar as informações de uma página
Route::get('/{slug}', 'HomeController@show')->name('show_page');
