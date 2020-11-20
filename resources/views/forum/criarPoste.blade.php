@extends('forum.layout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> »<a href="/forum/{{$slug_forum}}"class="text-info"> {{$forum_nome}}</a> » <a href="/forum/{{$slug_forum}}/{{$slug_categoria}}" class="text-info"> {{$categoria_nome}}</a> » <span>Postagem</span>
</div>


<main class="container bg-black text-light rounded mt-3">
    <h3>Novo Poste</h3>   
    <form action="{{route('forum.jogo.categoria.postagem.create',[$slug_forum,$slug_categoria])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control bg-black text-light" id="titulo" name="titulo" required minlength="5" placeholder="Min 5 Caracteres">
        </div>
    

        <div class="form-conteudo">
            <div class="form-conteudo-header">
                conteudo
            </div>
            <div class="form-group">
                <textarea name="conteudo" id="" cols="30" rows="10" class="form-control bg-black text-light" required minlength="5" placeholder="Min 5 Caracteres"></textarea>
            </div>
        </div>

        <button class="btn btn-outline-warning">Postar</button>
    </form>
</main>
@endsection
