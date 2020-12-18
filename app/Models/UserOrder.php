<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $fillable = ['referencia','pagseguro_code','pagseguro_status','items','fk_id_user'];
    public function user(){
        return $this->belongsTo(User::class,'fk_id_user');
    }
}

