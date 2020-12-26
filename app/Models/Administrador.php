<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StoreReceiveNewOrder;
class Administrador extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'administrador';

    public function notifyAboutStore(){
        $this->notify(new StoreReceiveNewOrder());
    }
    
}
