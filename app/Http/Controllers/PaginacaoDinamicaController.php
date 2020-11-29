<?php
//Controller responsavel por renderizar os novos dados de uma paginação especifica selecionada na rota de configuração

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class PaginacaoDinamicaController extends Controller
{
    /*
        Os metodos irão receber os dados da nova paginação e retorna-los em uma estrutura HTML para que possa ser renderizado do seu devido local

    */
    public function postagem(Request $request){
        $links = json_decode($request->all()['links']);
        $postagens = $this->converterParaCollection($request->all()['dados'],'App\Models\Postagem');

        return view('paginacao_dinamica.postagem',compact('postagens','links'));
    }

    public function comentario(Request $request){
        $links = json_decode($request->all()['links']);
        $comentarios = $this->converterParaCollection($request->all()['dados'],'App\Models\Comentario');
        return view('paginacao_dinamica.comentario',compact('comentarios','links'));
    }
    
    public function users(Request $request){
        $links = json_decode($request->all()['links']);
        $users = $this->converterParaCollection($request->all()['dados'],'App\Models\User');
        return view('paginacao_dinamica.usuario',compact('users','links'));
    }

    public function messages(Request $request){
        $links = json_decode($request->all()['links']);
        $mensagens = $this->converterParaCollection($request->all()['dados'],'App\Models\Mensagem');
        return view('paginacao_dinamica.mensagem',compact('mensagens','links'));
    }


    //recebe um array json e converte cada item para o seu respectivo Model para que seja possivel realizar as relações
    public function converterParaCollection($dados_estaticos,$class){
        $dados_estaticos = json_decode($dados_estaticos);
        foreach($dados_estaticos as $i => $d){
            $dados_estaticos[$i] = $class::where('id',$d->id)->first();
        }
        $dados = new Collection($dados_estaticos);
        return $dados;
    }
}
