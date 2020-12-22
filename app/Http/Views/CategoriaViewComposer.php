<?php

namespace App\Http\Views;
use App\Models\CategoriaParaProduto;

class CategoriaViewComposer{
    protected $categoriaParaProduto;
    public function __construct(CategoriaParaProduto $categoriaParaProduto){
        $this->categoriaParaProduto = $categoriaParaProduto;
    }

    public function compose($view){
        return $view->with('categoriasParaProdutos',$this->categoriaParaProduto->all(['nome','slug']));
    }
}