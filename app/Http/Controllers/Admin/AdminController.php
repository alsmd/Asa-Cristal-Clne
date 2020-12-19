<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Categoria;
use App\Models\CategoriaParaProduto;
use App\Models\Produto;


class AdminController extends Controller
{
    //
    protected $jogo;
    protected $categorias_para_produto;
    protected $categoria;
    protected $produto;

    public function __construct(Jogo $jogo,Categoria $categoria,Produto $produto,CategoriaParaProduto $categoria_para_produto){
        $this->jogo = $jogo;
        $this->categoria = $categoria;
        $this->categoria_para_produto = $categoria_para_produto;
        $this->produto = $produto;
    }

    public function index(){
        $jogos = $this->jogo::get();
        $categorias = $this->categoria::get();
        $categorias_para_produto = $this->categoria_para_produto::get();
        $produtos = $this->produto::get();
        return view('admin.index',compact('jogos','categorias','produtos','categorias_para_produto'));
    }
}
