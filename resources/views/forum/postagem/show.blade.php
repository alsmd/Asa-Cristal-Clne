@extends('layouts.forumLayout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="{{route('forum.index')}}" class="text-info">Página inicial</a > »<a href="{{route('forum.jogo.show',[$slug_forum])}}"class="text-info"> {{$forum_nome}}</a> » <a class="text-info" href="{{route('forum.jogo.categoria.postagem.index',[$slug_forum,$slug_categoria])}}"> {{$categoria_nome}}</a>
</div>

<main class="container bg-black text-light rounded mt-3 d-flex flex-column justify-content-between">
    
    <div class="row">
        <div class="col-sm-3 ">
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
        <form action="{{route('forum.jogo.categoria.postagem.destroy',[$slug_forum,$slug_categoria,$id])}}" method="delete">
            @csrf
            <button type="submit"  class="btn btn-danger">Apagar</button>
        </form>
        <button id="btn-editar-postagem"  class="btn btn-success ml-1">Editar</button> <!-- href="" -->
        <button id="btn-enviar-postagem" name="{{route('forum.jogo.categoria.postagem.update',[$slug_forum,$slug_categoria,$id])}}"class="btn btn-info ml-1" style="display:none">Enviar</button>
    </div>
</main>
<div class="container  px-0">
    <!-- Lista de Comentarios -->
    <div class="bg-black mt-4 p-4 rounded border " id="comentarios">
        <!-- Comentario -->
        @foreach($comentarios as $comentario)
        <div class="row my-2 p-2 border border-dark rounded">
            <div class="col-sm-3">
                <img src="{{($comentario->user()->first())->foto}}" alt="" class="w-100  border border-secondary" style="border-radius: 50% !important;">
                <p class="text-center text-warning mt-1">{{($comentario->user()->first())->name}}</p>
            </div>
            <div class="col-sm-9">
                <div class=" bg-dark  text-light rounded h-100 " style="padding:50px" >
                    {{$comentario->conteudo}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Escrever um novo Comentario -->
<div class="container realizar-comentario px-0">
    <div class="bg-black mt-4 p-4 rounded border border-dark">
        <div class="row">
            <div class="col-sm-12">
                <textarea name="{{route('forum.jogo.categoria.postagem.comentario.store',[$slug_forum,$slug_categoria,$id])}}" id="novo-comentario" cols="15" rows="4" class="form-control bg-dark text-light"></textarea>
                <button class="btn btn-outline-light mt-1 float-right" id="enviar-comentario">Enviar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modelo que sera utilizado para criar um comentario dinamico -->
<div class="d-none" id="comentario-modelo">
    <div class="row my-2 p-2 border border-dark rounded">
        <div class="col-sm-3">
            <img src="" alt="" class="w-100  border border-secondary foto" style="border-radius: 50% !important;">
            <p class="text-center text-warning mt-1 nome" ></p>
        </div>
        <div class="col-sm-9">
            <div class="bg-dark  text-light rounded h-100 comentario-conteudo " style="padding:50px" >
                
            </div>
        </div>
    </div>
</div>
@endsection