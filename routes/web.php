<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\PostagemController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ComentarioController;
use App\Models\User;
use App\Models\Chat;

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

Route::get('/', [IndexController::class,'index'])->name('home');


//   /forum
Route::middleware(['auth'])->group(function(){
    Route::prefix('/forum')->name('forum.')->group(function(){
        Route::get('/',[ForumController::class, 'index'])->name('index');
    
        Route::prefix('/{slug_forum}')->name('jogo.')->group(function(){
            /* Forum de um jogo especifico */
            Route::get('/',[ForumController::class, 'show'])->name('show');
            //
            Route::prefix('/{slug_categoria}')->name('categoria.')->group(function(){
                Route::resource('postagem','App\Http\Controllers\Admin\PostagemController');
                //crud comentarios
                Route::post('/{id_postagem}/comentario/store',[ComentarioController::class, 'store'])->name('postagem.comentario.store');
            });
        });
    });
    Route::get('/configuracao',function(){
        $postagens = auth()->user()->postagens()->paginate(5);
        $comentarios = auth()->user()->comentarios()->paginate(5);
        return view('configuracao.index',compact('postagens','comentarios'));
    })->name('configuracao');
    Route::post('/pm',function(){
        return view('pm.show');
    })->name('pm');
});
Route::get('/teste',function(){
    //Chat::make(['fk_id_user1'=>1,'fk_id_user2'=>2])->save();
    $user = User::find(1)->first();
    dd(Chat::where('fk_id_user1',$user->id)->orwhere('fk_id_user2',$user->id)->get());
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
