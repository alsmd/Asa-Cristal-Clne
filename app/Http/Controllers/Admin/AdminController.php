<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Categoria;
use App\Models\Produto;


class AdminController extends Controller
{
    //
    protected $jogo;
    protected $categoria;
    protected $produto;

    public function __construct(Jogo $jogo,Categoria $categoria,Produto $produto){
        $this->jogo = $jogo;
        $this->categoria = $categoria;
        $this->produto = $produto;
    }

    public function index(){
        $jogos = $this->jogo::get();
        $categorias = $this->categoria::get();
        $produtos = $this->produto::get();
        return view('admin.index',compact('jogos','categorias','produtos'));
    }
}
