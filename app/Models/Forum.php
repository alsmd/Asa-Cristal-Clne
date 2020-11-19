<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forum';
    protected $fillable = ['slug','frase','foto','nome'];


    //Um forum pertence a um Jogo
    public function jogo(){
        return $this->belongsTo(Jogo::class,'fk_id_jogo');
    }

    //contem postagnes
    public function postagens(){
        return $this->hasMany(Postagem::class,'fk_id_forum');
    }
}
