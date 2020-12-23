<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Produto;
class IndexController extends Controller{

    private $jogo;
    private $produto;

    public function __construct(Jogo $jogo,Produto $produto){
        $this->jogo = $jogo;
        $this->produto = $produto;
    }
    //
    public function index(){
        $jogos = $this->jogo->paginate(5);
        $produtos = $this->produto->paginate(4);
        return view('index.home',compact('jogos','produtos'));
    }
}
