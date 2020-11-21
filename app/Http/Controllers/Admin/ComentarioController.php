<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Models
use App\Models\Forum;
use App\Models\Categoria;
use App\Models\Postagem;
use App\Models\Comentario;
use App\Models\User;
class ComentarioController extends Controller
{
    //


    public function create(Request $request,$slug_forum,$slug_categoria,$postagem_id){
        $conteudo = $request->all()['conteudo'];
        $user = User::find(2); //sera o usuario da session atual
        $comentario = Comentario::make([
            'conteudo'=>$conteudo,
            'fk_id_postagem' => $postagem_id,
            'autor'=>'Flavio' //sera o nome do usuario da session
        ]);
        $user->comentarios()->save($comentario);
        return ['foto'=>$user->foto,'nome'=>$user->name,'conteudo'=>$comentario->conteudo];
    }
}
