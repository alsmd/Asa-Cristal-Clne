<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Models
use App\Models\Forum;
use App\Models\Categoria;
use App\Models\Postagem;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_forum,$slug_categoria,$id){
        $forum_nome = ( Forum::where('slug',$slug_forum)->first())->nome;
        $categoria_nome= (Categoria::where('slug',$slug_categoria)->first())->nome;
        $postagem = Postagem::where('id',$id)->first();
        $comentarios = $postagem->comentarios;
       return view('forum.postagem',compact('slug_forum','slug_categoria','categoria_nome','forum_nome','postagem','id','comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug_forum, $slug_categoria){
        //
        $forum_nome = (Forum::where('slug',$slug_forum)->first())->nome;
        $categoria_nome = (Categoria::where('slug',$slug_categoria)->first())->nome;
        return view('forum.criarPoste',compact('slug_forum','slug_categoria','categoria_nome','forum_nome'));
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
        $forum = Forum::where('slug',$slug_forum)->first(); //forum atual
        $categoria = Categoria::where('slug',$slug_categoria)->first(); //categoria selecionado
        $postagem = Postagem::make(compact('titulo','conteudo','autor'));
        //linkando a postagem a um forum/categoria/usuario
        $postagem->forum()->associate($forum->id);
        $postagem->categoria()->associate($categoria->id);
        $postagem->user()->associate(1); //sera associado ao usuario logado futuramente
        //salvando dado no DB
        if($postagem->save() == 1){
            flash('Postagem realizada com sucesso.')->success()->important();
            return redirect()->route('forum.jogo.categoria.home',[$slug_forum,$slug_categoria]);
        }else{
            flash('Houve um erro na tentativa de criação da postagem.')->success()->important();
            return redirect()->route('forum.jogo.categoria.home',[$slug_forum,$slug_categoria]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Postagem::where('id',$id)->update($request->all());
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
        if(Postagem::where('id',$id)->delete() == 1){
            flash('Postagem apagada com sucesso.')->success()->important();
            return redirect()->route('forum.jogo.categoria.home',[$slug_forum,$slug_categoria]);


        }else{
            flash('Houve um erro na tentativa de apagar a postagem.')->error()->important();
            return redirect()->route('forum.jogo.categoria.home',[$slug_forum,$slug_categoria]);
        }
    }
}
