<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
class IndexController extends Controller{

    private $jogos;

    public function __construct(Jogo $jogos){
        $this->jogos = $jogos;
    }
    //
    public function index(){
        $jogos = $this->jogo->paginate(5);
        return view('index.home',compact('jogos'));
    }
}
