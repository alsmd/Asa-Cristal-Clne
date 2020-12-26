<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Administrador extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'administrador';


    public function user(){
        return $this->belongsTo(User::class,'fk_id_user');
    }
    
}
