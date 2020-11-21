<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Models
use App\Models\Forum;
use App\Models\Categoria;
use App\Models\Postagem;
class ForumController extends Controller
{
    //
    public function forumHome(){
        $forums = \App\Models\Forum::paginate(5);
        return view('forum.home',compact('forums'));
    }  
    /*
    **Recupera o slug do forum selecionado e renderiza o forum do jogo com as categorias disponiveis
    */
    public function forumJogo($slug_forum){
        $forum_nome = (Forum::where('slug',$slug_forum)->first(['nome']))->nome;
        $forum_frase = (Forum::where('slug',$slug_forum)->first(['frase']))->frase;
        $categorias = Categoria::all();
        return view('forum.forumJogo',compact('categorias','slug_forum','forum_nome','forum_frase'));
    }
    /*
    **Recupera o slug do jogo e da categoria da postagem e devolve uma view mostrando as postagens correspondentes
    */
    public function forumJogoCategoria($slug_forum,$slug_categoria){
        $forum = Forum::where('slug',$slug_forum)->first();
        $forum_nome = $forum->nome;
        $categoria =Categoria::where('slug',$slug_categoria)->first();
        $categoria_nome = $categoria->nome;
        //recupera as postagens ao forum e categorias selecionadas
        $postagens = $forum->postagens()->where('fk_id_categoria',$categoria->id)->paginate(5);
        return view('forum.categoria',compact('postagens','slug_forum','slug_categoria','categoria_nome','forum_nome'));
    }
}
