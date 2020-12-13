<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Jogo extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['nome','descricao','foto','slug'];

    //protected $table = 'jogos';


    //Um jogo possui um Forum
    public function forum(){
        return $this->hasOne(Forum::class,'fk_id_jogo');
    }
    //Um jogo possui muitos produtos

    public function produtos(){
        return $this->hasMany(Produto::class,'fk_id_jogo');
    }

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
        ->generateSlugsFrom('nome')
        ->saveSlugsTo('slug');
    }
}

