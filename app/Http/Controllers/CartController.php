<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $hasNotCarrinho = !(session()->has('carrinho'));
        if($hasNotCarrinho){
            session()->put('carrinho',[]);
        }
        $produtos = session()->get('carrinho');
        return view('carrinho.index',compact('produtos'));
    }
    //
    public function add(Request $request){
        $produto = $request->get('produto');

        if(session()->has('carrinho')){
            //caso esse produto ja exista no carrinho eu aumento a quantidade
            $produtos = session()->get('carrinho');
            $acesso = false;
            foreach($produtos as $indice => $produto_armazenado){
                if($produto_armazenado['slug'] == $produto['slug']){
                    $acesso =true;
                    $produtos[$indice]['quantidade'] += $produto['quantidade'];
                }
            }
            //caso o produto selecionado ja exista no carrinho ele ira mudar sua quantidade e atualizar na sessão, caso não exista ele ira adicionar esse novo produto
            if($acesso){
                session()->put('carrinho',$produtos);
            }else{
                session()->push('carrinho',$produto);
            }
        }else{
            $produtos[] = $produto;
            session()->put('carrinho',$produtos);
        }
        flash('Produto adicionado no carrinho!')->success()->important();
        return redirect()->route('produto',[$produto['slug']]);

    }

    public function remove($slug){
        //remove o produto da chave produtos da session
        $produtos = session()->get('carrinho');
        $produtos = array_filter($produtos,function($line)use($slug){
            return $line['slug'] != $slug;
        });
        
        session()->put('carrinho',$produtos);
        flash('Produto removido do carrinho!')->success()->important();
        return redirect()->route('carrinho.index');

    }

    public function cancelar(){
        session()->forget('carrinho');
        flash('Compra Cancelada!')->success()->important();
        return redirect()->route('carrinho.index');
    }
}
