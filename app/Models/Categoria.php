<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Categoria extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['nome','descricao','slug','foto'];
    //tem varias postagens
    public function postagens(){
        return $this->hasMany(Postagem::class,'fk_id_categoria');
    }

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
        ->generateSlugsFrom('nome')
        ->saveSlugsTo('slug');
    }
}
