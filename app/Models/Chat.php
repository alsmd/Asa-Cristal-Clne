<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chat';
    protected $fillable = ['fk_id_user1','fk_id_user2'];

    //Tem varias mensagens

    public function mensagens(){
        return $this->hasMany(Mensagem::class,'fk_id_chat');
    }
}
