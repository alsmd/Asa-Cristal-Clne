<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['conteudo','autor','fk_id_postagem'];

    //pertente a um usuario
    public function user(){
        return $this->belongsTo(User::class,'fk_id_user');
    }
    //pertente a uma postagem
    public function postagem(){
        return $this->belongsTo(Postagem::class,'fk_id_postagem');
    }

}
