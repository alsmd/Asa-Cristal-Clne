<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;
    protected $table = 'categoria_produto';
    protected $fillable = ['fk_id_categoria_para_produto','fk_id_produto'];


    public function produtos(){
        return $this->hasMany(Produto::class,'fk_id_produto');
    }

    public function categorias(){
        return $this->hasMany(CategoriaParaProduto::class,'fk_id_categoria_para_produto');
    }
}
