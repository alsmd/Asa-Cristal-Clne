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
            //Rota que contera o formulario de criação de uma nova postagem
            Route::get('/criar',[ForumController::class, 'criar'])->name('postagem.criar');
            //Rota ira mostrar uma postagem especifica
            Route::get('/{id_postagem}',[ForumController::class, 'mostrarPostagem'])->name('postagem.mostrar');
            //Rota que ira processar a criação da postagem
            Route::post('/postagem',[ForumController::class, 'postagem'])->name('postagem.create');

            //
            Route::post('/update/{id_postagem}',[ForumController::class,'update'])->name('postagem.update');
            Route::post('/delete/{id_postagem}',[ForumController::class,'delete'])->name('postagem.delete');
        });
        
    });
    
});


