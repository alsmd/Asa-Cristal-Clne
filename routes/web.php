<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\PostagemController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ComentarioController;

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


//   /forum
Route::prefix('/forum')->name('forum.')->group(function(){
    Route::get('/',[ForumController::class, 'forumHome'])->name('home');

    Route::prefix('/{slug_forum}')->name('jogo.')->group(function(){
        /* Forum de um jogo especifico */
        Route::get('/',[ForumController::class, 'forumJogo'])->name('home');
        //   /forum/slug_forum/slug_categoria
        Route::prefix('/{slug_categoria}')->name('categoria.')->group(function(){
            /* Categoria para postagens dentro de um Forum */
            Route::get('/',[ForumController::class, 'forumJogoCategoria'])->name('home');
            Route::get('/criar',[PostagemController::class, 'create'])->name('postagem.criar');
            Route::get('/{id_postagem}',[PostagemController::class, 'index'])->name('postagem.mostrar');
            //crud postagem
            Route::post('/store',[PostagemController::class, 'store'])->name('postagem.store');
            Route::post('/update/{id_postagem}',[PostagemController::class,'update'])->name('postagem.update');
            Route::post('/destroy/{id_postagem}',[PostagemController::class,'destroy'])->name('postagem.destroy');
            //crud comentarios
            Route::post('/{id_postagem}/comentario/store',[ComentarioController::class, 'store'])->name('postagem.comentario.store');

        });
        
    });
    
});


