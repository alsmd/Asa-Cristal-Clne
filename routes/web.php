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
    //Criar um Usuario
    //$user = User::create(['name' => 'Flavio','email'=> 'teste@gmail.com','password' => bcrypt('123')]);

    //Criar um um Novo Jogo
    //$jogo = Jogo::create(['nome' => 'Asa de Cristal','slug'=> 'Asa-De-Cristal']);


    //Criar um Novo Forum para o Jogo
    //$asa_forum = $jogo->forum()->save(Forum::make(['slug'=>'asa-de-cristal-forum']));

    //Criar uma Categoria 

    //$categoria = Categoria::create(['nome'=>'suporte','descricao'=> 'Duvidas ou Problemas que o usuario possa ter com relação a algum sistema ou problemas no site ou jogo','slug'=> 'categoria-suporte']);

    //Criar uma Postagem que se encaixa em uma categoria, foi feita por um usuario dentro de um Forum
    /* $categoria = Categoria::where('nome','suporte')->first();
    $forum = Forum::where('slug','asa-de-cristal-forum')->first();
    $usuario = User::where('email','teste@gmail.com')->first();
    $postagem = Postagem::make([
        'titulo'=> 'Item Sumiu',
        'conteudo'=>'Depois da manutenção semanal minha manopla sumiu do meu inventario',
        'autor'=> $usuario->name
    ]);
    $postagem->categoria()->associate($categoria->id);
    $postagem->forum()->associate($forum->id);
    $postagem->user()->associate($usuario->id);
   $postagem->save(); */

    //dd($usuario->postagens()->save($postagem));


    //Criando associação de usuarios e produtos
/*     $jogo = Jogo::where('slug','Asa-De-Cristal')->first();
    $produto = Produto::make(
        [
            'nome'=>'Gamesow-Coins',
            'valor'=>200.00,
            'descricao'=>'Ganhe Dois Mil Coins na plataforma para gastar em seus jogos',
            'moeda_utilizada'=>'pt-br',
            'slug'=>'gamesow-buy-coins'
        ]
    );
    $produto->jogo()->associate($jogo->id);
    $produto->save(); */
    $produto = Produto::find(1)->first();
    $usuario = User::where('email','teste@gmail.com')->first();

    //$produto->users()->attach(41);
   dd( $usuario->produtos()->sync([2]));

    return ProdutoUsuario::all();
});