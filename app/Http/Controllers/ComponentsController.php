<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Postagem;
use App\Models\Comentario;

class ComponentsController extends Controller
{
    //

    public function postagem(Request $request){
        $postagens_estaticos = json_decode($request->all()['dados']);
        $postagens = new Collection;
        $links = json_decode($request->all()['links']);
        foreach($postagens_estaticos as $p){
            $postagens = $postagens->merge(Postagem::where('id',$p->id)->get());
        }
        return view('components.postagem',compact('postagens','links'));
    }

    public function comentario(Request $request){
        $comentarios_estaticos = json_decode($request->all()['dados']);
        $comentarios = new Collection;
        $links = json_decode($request->all()['links']);
        foreach($comentarios_estaticos as $c){
            $comentarios = $comentarios->merge(Comentario::where('id',$c->id)->get());
        }
        return view('components.comentario',compact('comentarios','links'));
    }
}
