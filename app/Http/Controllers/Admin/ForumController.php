<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Categoria;
class ForumController extends Controller
{
    //
    public function index(){
        $forums = \App\Models\Forum::paginate(5);
        
        return view('forum.home',compact('forums'));
    }  

    /*
    **Recupera o slug do forum selecionado e renderiza o forum do jogo com as categorias disponiveis
    */
    public function forum($slug){
        $categorias = Categoria::all();
        return view('forum.forum',compact('categorias','slug'));
    }
    /*
    **Recupera o slug do jogo e da categoria da postagem e devolve uma view mostrando as postagens correspondentes
    */
    public function forumCategoria($slug_jogo,$slug_categoria){
        $forum = Forum::where('slug',$slug_jogo)->first();
        $categoria =Categoria::where('slug',$slug_categoria)->first();
        $postagens = $forum->postagens()->where('fk_id_categoria',$categoria->id)->get();
        return view('forum.categoria',compact('postagens','slug_jogo','slug_categoria'));
    }

    public function create(){
        return view('forum.create');
    }

    public function postagem(Request $request){
        dd($request->all());
        return view('forum.create');
    }
}
