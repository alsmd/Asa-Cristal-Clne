@extends('forum.layout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> »<a href="/forum/{{$slug_forum}}"class="text-info"> {{$forum_nome}}</a> » <a class="text-info" href="/forum/{{$slug_forum}}/{{$slug_categoria}}"> {{$categoria_nome}}</a>
</div>

<main class="container bg-black text-light rounded mt-3">
    
    <div class="row">
        <div class="col-md-3">
            <img src="https://www.tenhomaisdiscosqueamigos.com/wp-content/uploads/2020/06/michael-keaton-batman-1280x720.jpg" alt="" class="w-100 rounded border border-secondary">
            <p class="text-center text-warning">{{($postagem->user()->first())->name}}</p>
        </div>
        <div class="col-md-9">
            <h3 class="text-center">{{$postagem->titulo}}</h3>
            
            <div class="conteudo mt-4 bg-dark p-4 h-100 rounded" style="min-height:300px">
                {{$postagem->conteudo}}
            </div>
        </div>
    </div>
</main>

@endsection