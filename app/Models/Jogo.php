<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = ['nome','slug'];

    //protected $table = 'jogos';


    //Um jogo possui um Forum
    public function forum(){
        return $this->hasOne(Forum::class,'fk_id_jogo');
    }
    //Um jogo possui muitos produtos

    public function produtos(){
        return $this->hasMany(Produto::class,'fk_id_jogo');
    }
}
