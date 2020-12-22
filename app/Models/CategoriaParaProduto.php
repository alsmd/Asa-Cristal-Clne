<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class CategoriaParaProduto extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'categoria_para_produto';
    protected $fillable = ['nome','descricao','slug'];


    //pertence a varias categorias
    public function produtos(){
        return $this->belongsToMany(Produto::class,'categoria_produto','fk_id_categoria_para_produto','fk_id_produto');
    }

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
        ->generateSlugsFrom('nome')
        ->saveSlugsTo('slug');
    }
}
