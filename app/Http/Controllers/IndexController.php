<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Produto;
use App\Models\User;
use App\Models\Administrador;
class IndexController extends Controller{

    private $jogo;
    private $produto;
    private $user;
    private $administrador;

    public function __construct(Jogo $jogo,Produto $produto,User $user,Administrador $administrador){
        $this->jogo = $jogo;
        $this->produto = $produto;
        $this->user = $user;
        $this->administrador = $administrador;
    }
    //
    public function index(){
        $jogos = $this->jogo->paginate(5);
        $produtos = $this->produto->paginate(3);
        $user = ($this->administrador->first())->user;
        $notifications = $user->unreadNotifications;
        return view('index.home',compact('jogos','produtos','notifications'));
    }
}
