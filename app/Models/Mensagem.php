<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $fillable = ['mensagem','fk_id_user','status','fk_id_chat'];

    protected $table = 'mensagem';

    //Pertence a um chat

    public function chat(){
        return $this->belongsTo(Chat::class,'fk_id_chat');
    }
    //Pertence a um usuario

    public function user(){
        return $this->belongsTo(User::class,'fk_id_user');
    }
}
