<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\PostagemController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ComentarioController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PaginacaoDinamicaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\User;
use App\Models\Chat;
use App\Models\Mensagem;

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
//home
Route::get('/', [IndexController::class,'index'])->name('home');
//visualizar produto
Route::get('/produto/{slug}', [ProdutoController::class,'show'])->name('produto');
//   /forum
Route::middleware(['auth'])->group(function(){
    Route::prefix('/forum')->name('forum.')->group(function(){
        Route::get('/',[ForumController::class, 'index'])->name('index');
        Route::get('/create',[ForumController::class, 'create'])->name('create')->middleware('admin');
        Route::get('/edit',[ForumController::class, 'edit'])->name('edit')->middleware('admin');
    
        Route::prefix('/{slug_forum}')->name('jogo.')->group(function(){
            /* Forum de um jogo especifico */
            Route::get('/',[ForumController::class, 'show'])->name('show');
            //
            Route::prefix('/{slug_categoria}')->name('categoria.')->group(function(){
                //todas operações relacionadas a postagem
                Route::resource('postagem','App\Http\Controllers\Admin\PostagemController');
                //crud comentarios
                Route::post('/{id_postagem}/comentario/store',[ComentarioController::class, 'store'])->name('postagem.comentario.store');
            });
        });
    });
    Route::get('/configuracao',function(){
        $postagens = auth()->user()->postagens()->orderBy('created_at','desc')->paginate(5);
        $comentarios = auth()->user()->comentarios()->orderBy('created_at','desc')->paginate(5);
        $users = User::where('id','!=',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);
        
        
        //recupera as mensagens dos chats ao qual o usuario faz parte
        $mensagens = Mensagem::rightJoin('chat',function($join){ //QUERY  A SER ARRUMADA
            $join->on('chat.id','mensagem.fk_id_chat')
            ->where('chat.fk_id_user1',auth()->user()->id)->orWhere('chat.fk_id_user2',auth()->user()->id);
        })->select(['mensagem.mensagem','mensagem.fk_id_user','mensagem.id'])->where('mensagem.fk_id_user','!=',auth()->user()->id)->paginate(5);
        //retorna os dados referente a proxima paginação selecionada
        if(Request::ajax()){
            $acao = $_GET['aba'];
            switch($acao){
                case 'postagem-list':
                    return $postagens;
                break;
                case 'comentario-list':
                    return $comentarios;
                break;
                case 'list-messages':
                    return $mensagens;
                break;
                case 'list-users':
                    return $users;
                break;
            }
        }
        return view('configuracao.index',compact('postagens','comentarios','users','mensagens'));
    })->name('configuracao');

    Route::post('/chat', [MensagemController::class,'index'])->name('chat');
    Route::post('/chat/store', [MensagemController::class,'store'])->name('chat.store');
    Route::post('/components/postagem-list', [PaginacaoDinamicaController::class,'postagem']);
    Route::post('/components/comentario-list', [PaginacaoDinamicaController::class,'comentario']);
    Route::post('/components/list-messages', [PaginacaoDinamicaController::class,'messages']);
    Route::post('/components/list-users', [PaginacaoDinamicaController::class,'users']);

    Route::post('user/update',[UserController::class,'update'])->name('user.update');
    
    Route::get('user/{user}',[UserController::class,'show'])->name('user.show');

    //area administrativa
    Route::middleware(['admin'])->group(function(){
        Route::prefix('admin')->name('admin.')->group(function(){
            Route::get('/',[AdminController::class,'index'])->name('index');
            Route::resource('jogo','App\Http\Controllers\Admin\JogoController');
            Route::resource('categoria','App\Http\Controllers\Admin\CategoriaController');
            Route::resource('produto','App\Http\Controllers\Admin\ProdutoController');
        });
    });
   
    //carrinho
    Route::prefix('carrinho')->name('carrinho.')->group(function(){
        Route::get('/',[CartController::class,'index'])->name('index');
    
        Route::post('add',[CartController::class,'add'])->name('add');
        Route::post('remove/{slug}',[CartController::class,'remove'])->name('remove');
        Route::get('cancelar',[CartController::class,'cancelar'])->name('cancelar');
    });
    //checkout
    Route::middleware(['checkout'])->group(function(){
        Route::prefix('checkout')->name('checkout.')->group(function(){
            Route::get('/',[CheckoutController::class,'index'])->name('index');
            Route::post('/proccess',[CheckoutController::class,'proccess'])->name('proccess');
            Route::get('/thanks',[CheckoutController::class,'thanks'])->name('thanks');
        
        });
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


