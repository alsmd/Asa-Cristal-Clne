<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Categoria;
use App\Models\CategoriaParaProduto;
use App\Models\Produto;
use App\Models\UserOrder;
use App\Models\Administrador;


class AdminController extends Controller
{
    //
    protected $jogo;
    protected $categorias_para_produto;
    protected $categoria;
    protected $produto;
    protected $order;
    protected $administrador;

    public function __construct(Jogo $jogo,Categoria $categoria,Produto $produto,CategoriaParaProduto $categoria_para_produto,UserOrder $order,Administrador $administrador){
        $this->jogo = $jogo;
        $this->categoria = $categoria;
        $this->categoria_para_produto = $categoria_para_produto;
        $this->produto = $produto;
        $this->order = $order;
        $this->administrador = $administrador;
    }

    public function index(){

        $jogos = $this->jogo::get();
        $categorias = $this->categoria::get();
        $categorias_para_produto = $this->categoria_para_produto::get();
        $produtos = $this->produto::get();
        $orders = $this->order->leftjoin('users','users.id','=','user_orders.fk_id_user')->select(['users.name as user_nome','user_orders.*'])->orderBy('created_at','desc')->paginate(8);
        $admin = $this->administrador->first();
        $notifications = $admin->unreadNotifications;
        $notifications->each->markAsRead();
        return view('admin.index',compact('jogos','categorias','produtos','categorias_para_produto','orders'));
    }
}
