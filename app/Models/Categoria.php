<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome','descricao','slug','foto'];
    //tem varias postagens

    public function postagens(){
        return $this->hasMany(Postagem::class,'fk_id_categoria');
    }
}
