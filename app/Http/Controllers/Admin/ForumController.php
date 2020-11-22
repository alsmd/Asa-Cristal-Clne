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
    
    private $forum;
    private $categoria;

    public function __construct(Categoria $categoria, Forum $forum){
        $this->categoria = $categoria;
        $this->forum = $forum;
    }
    /*
    **Lista os foruns disponiveis
    */
    public function index(){
        $forums =$this->forum->paginate(5);
        return view('forum.index',compact('forums'));
    }  
    /*
    **mostra um forum especifico
    */
    public function show($slug_forum){
        $forum_nome = ($this->forum->where('slug',$slug_forum)->first(['nome']))->nome;
        $forum_frase = ($this->forum->where('slug',$slug_forum)->first(['frase']))->frase;
        $categorias = $this->categoria->all();
        return view('forum.show',compact('categorias','slug_forum','forum_nome','forum_frase'));
    }
}
