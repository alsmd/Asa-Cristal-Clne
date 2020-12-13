<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Categoria;


class AdminController extends Controller
{
    //



    public function index(){
        $jogos = Jogo::get();
        $categorias = Categoria::get();
        return view('admin.index',compact('jogos','categorias'));
    }
}
