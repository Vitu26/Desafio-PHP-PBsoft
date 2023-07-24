<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Product;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**
 * O arquivo de rotas da web é usado para registrar as rotas relacionadas à interface da aplicação, permitindo que os usuários acessem diferentes páginas e recursos da aplicação por meio de URLs específicas. As rotas definidas nesse arquivo determinam quais controladores e ações do controlador serão responsáveis por processar as solicitações e retornar as views apropriadas para os usuários.
 */

Route::resource('/products', HomeController::class);//método que define rotas RESTful, incluem rotas para listagem, exibição, criação, edição, atualização, armazenamento e exclusão de produtos

Route::get('/', function(){
    return view('main');
});//acesso a página inicial, quando acessa a página incial a view 'main' é retornada

