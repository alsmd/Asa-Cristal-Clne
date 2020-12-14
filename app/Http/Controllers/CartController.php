<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
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
        $produtos = session()->get('carrinho');
        foreach($produtos as $indice => $produto_armazenado){
            if($produto_armazenado['slug'] == $slug){
                unset($produtos[$indice]);
            }
        }
        session()->put('carrinho',$produtos);
        flash('Produto removido do carrinho!')->success()->important();
        return redirect()->route('carrinho.index');

    }
}
