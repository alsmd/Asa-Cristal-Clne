<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\IndexController;

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

Route::get('/', [IndexController::class,'index']);

/* forum home page */
Route::get('/forum',[ForumController::class, 'index']);
/* Forum de um jogo especifico */
Route::get('/forum/{slug_jogo}',[ForumController::class, 'forum']);
/* Categoria para postagens dentro de um Forum */
Route::get('/forum/{slug_jogo}/{slug_categoria}',[ForumController::class, 'forumCategoria']);


Route::get('/forum/create',[ForumController::class, 'create']);

Route::post('/forum/postagem',[ForumController::class, 'postagem']);


