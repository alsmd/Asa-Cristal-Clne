<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Jogo;
use App\Models\Forum;
use App\Models\Categoria;
use App\Models\Postagem;
use App\Models\Produto;
use App\Models\ProdutoUsuario;

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
    return view('index.home');
});
Route::get('/forum', function () {
    return view('forum.home');
});


Route::get('/criar', function(){
    

    return ProdutoUsuario::all();
});