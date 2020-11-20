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
Route::prefix('/forum')->group(function(){
    Route::get('/',[ForumController::class, 'forumHome']);
    //   /forum/slug_forum
    Route::prefix('/{slug_forum}')->group(function(){
        /* Forum de um jogo especifico */
        Route::get('',[ForumController::class, 'forumJogo']);
        //   /forum/slug_forum/slug_categoria
        Route::prefix('/{slug_categoria}')->group(function(){
            /* Categoria para postagens dentro de um Forum */
            Route::get('/',[ForumController::class, 'forumJogoCategoria']);
            //Rota que contera o formulario de criação de uma nova postagem
            Route::get('/criar',[ForumController::class, 'criar']);
            //Rota que ira processar a criação da postagem
            Route::post('/postagem',[ForumController::class, 'postagem']);
            //Rota ira mostrar uma postagem especifica
            Route::get('/{id_postagem}',[ForumController::class, 'mostrarPostagem']);
            //
            Route::post('/update/{id_postagem}',[ForumController::class,'update']);
        });
        
    });
    
});


