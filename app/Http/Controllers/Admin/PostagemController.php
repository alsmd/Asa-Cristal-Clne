<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Models
use App\Models\Forum;
use App\Models\Categoria;
use App\Models\Postagem;

class PostagemController extends Controller{
    private $postagem;
    private $categoria;
    private $forum;


    public function __construct(Postagem $postagem, Categoria $categoria, Forum $forum){
        $this->postagem = $postagem;
        $this->categoria = $categoria;
        $this->forum = $forum;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_forum,$slug_categoria){
        $forum = $this->forum->where('slug',$slug_forum)->first();
        $forum_nome = $forum->nome;
        $categoria =$this->categoria->where('slug',$slug_categoria)->first();
        $categoria_nome = $categoria->nome;
        //recupera as postagens ao forum e categorias selecionadas
        $postagens = $forum->postagens()->where('fk_id_categoria',$categoria->id)->paginate(5);
        return view('forum.postagem.index',compact('postagens','slug_forum','slug_categoria','categoria_nome','forum_nome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug_forum, $slug_categoria){
        //
        $forum_nome = ($this->forum->where('slug',$slug_forum)->first())->nome;
        $categoria_nome = ($this->categoria->where('slug',$slug_categoria)->first())->nome;
        return view('forum.postagem.create',compact('slug_forum','slug_categoria','categoria_nome','forum_nome'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug_forum,$slug_categoria){
        $titulo = $request->all()['titulo'];
        $conteudo = $request->all()['conteudo'];
        $autor = 'Susan Wisoky'; //sera o nome do usuario logado futuramente
        $forum = $this->forum->where('slug',$slug_forum)->first(); //forum atual
        $categoria = $this->categoria->where('slug',$slug_categoria)->first(); //categoria selecionado
        $postagem = $this->postagem->make(compact('titulo','conteudo','autor'));
        //linkando a postagem a um forum/categoria/usuario
        $postagem->forum()->associate($forum->id);
        $postagem->categoria()->associate($categoria->id);
        $postagem->user()->associate(1); //sera associado ao usuario logado futuramente
        //salvando dado no DB
        if($postagem->save() == 1){
            flash('Postagem realizada com sucesso.')->success()->important();
            return redirect()->route('forum.jogo.categoria.postagem.index',[$slug_forum,$slug_categoria]);
        }else{
            flash('Houve um erro na tentativa de criação da postagem.')->success()->important();
            return redirect()->route('forum.jogo.categoria.postagem.index',[$slug_forum,$slug_categoria]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug_forum,$slug_categoria,$id){
        $forum_nome = ( $this->forum->where('slug',$slug_forum)->first())->nome;
        $categoria_nome= ($this->categoria->where('slug',$slug_categoria)->first())->nome;
        $postagem = $this->postagem->where('id',$id)->first();
        $comentarios = $postagem->comentarios;
       return view('forum.postagem.show',compact('slug_forum','slug_categoria','categoria_nome','forum_nome','postagem','id','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug_forum,$slug_categoria,$id){
        $conteudo = $request->all()['conteudo'];
        $titulo = $request->all()['titulo'];
        $this->postagem->where('id',$id)->update($request->all());
        return  $conteudo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug_forum,$slug_categoria,$id){
        //
        if($this->postagem->where('id',$id)->delete() == 1){
            flash('Postagem apagada com sucesso.')->success()->important();
            return redirect()->route('forum.jogo.categoria.postagem.index',[$slug_forum,$slug_categoria]);


        }
        flash('Houve um erro na tentativa de apagar a postagem.')->error()->important();
        return redirect()->route('forum.jogo.categoria.postagem.index',[$slug_forum,$slug_categoria]);
    
    }
}
