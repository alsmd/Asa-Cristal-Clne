<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable =[
        'nome',
        'valor',
        'descricao',
        'corpo',
        'moeda_utilizada',
        'slug'
    ];



    //Varios produtos pertencem a um jogo
    public function jogo(){
        return $this->belongsTo(Jogo::class,'fk_id_jogo');
    }

    //Pode ser comprado por varios usuarios
    public function users(){
        return $this->belongsToMany(User::class,'produto_usuario','fk_id_produto','fk_id_user');
    }
}
