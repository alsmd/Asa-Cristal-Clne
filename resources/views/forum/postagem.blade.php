@extends('forum.layout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> »<a href="/forum/{{$slug_forum}}"class="text-info"> {{$forum_nome}}</a> » <a class="text-info" href="/forum/{{$slug_forum}}/{{$slug_categoria}}"> {{$categoria_nome}}</a>
</div>

<main class="container bg-black text-light rounded mt-3 d-flex flex-column justify-content-between">
    
    <div class="row">
        <div class="col-sm-3">
            <img src="https://www.tenhomaisdiscosqueamigos.com/wp-content/uploads/2020/06/michael-keaton-batman-1280x720.jpg" alt="" class="w-100 rounded border border-secondary">
            <p class="text-center text-warning">{{($postagem->user()->first())->name}}</p>
        </div>
        <div class="col-sm-9 container-postagem">
            <h3 class="text-center display-4 titulo ">{{$postagem->titulo}}</h3>
            
            <div class="conteudo mt-4 bg-dark   rounded" style="padding:50px" >
                {{$postagem->conteudo}}
            </div>
            
        </div>
    </div>
    <div class="d-flex justify-content-end mt-2 justify-self-end" style="display: absolute;">
        <form action="/forum/{{$slug_forum}}/{{$slug_categoria}}/delete/{{$id}}" method="POST">
            @csrf
            <button type="submit"  class="btn btn-danger">Apagar</button>
        </form>
        <button id="btn-editar-postagem"  class="btn btn-success ml-1">Editar</button> <!-- href="" -->
        <button id="btn-enviar-postagem" name="/forum/{{$slug_forum}}/{{$slug_categoria}}/update/{{$id}}"class="btn btn-info ml-1" style="display:none">Enviar</button>
    </div>
</main>
@endsection