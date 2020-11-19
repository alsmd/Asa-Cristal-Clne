@extends('forum.layout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> »<a href="/forum/{{$slug_forum}}"class="text-info"> {{$forum_nome}}</a> <span class="text-info">» {{$categoria_nome}}</span>
</div>

<main class="container bg-black text-light rounded pb-1">
    <header id="main-header ">
        <a href="/forum/{{$slug_forum}}/{{$slug_categoria}}/criar" class="btn btn-outline-primary">Novo</a>  Bem vindo Usuario, Sua última visita foi em 04:27 2020-10-26, <a href="">Postagens</a>, <a href="">Ver novo tópico</a>, <a href="">Marcar lido</a>

        <div class="d-flex justify-content-end">
            <small class="text-success">Hoje: 26, Ontem: 33, Membros: 211836</small>
        </div>
    </header>
    <h3 class="display-4 mt-2 mb-4">Postagens</h3>

    
    <!-- Lista Dos forum disponiveis -->
    <div id="jogos mx-2">
        <!-- Forums desponiveis no DB -->
        @foreach($postagens as $postagem)
        <div class="row jogo text-light mb-3 mx-0">
            <div class="col-md-8">
                <div class="d-flex">
                    <img src="https://image.flaticon.com/icons/png/512/50/50050.png" alt="" class="rounded align-self-stretch" width="135" height="103" >
                    <div class="d-flex flex-column ml-3">
                        <h3 class="m-0 d-inline jogo-titulo"><a href="/forum/{{$slug_forum}}/{{$slug_categoria}}" class="text-warning">{{$postagem->titulo}}</a></h3> 
                        <p class="lead m-0 jogo-conteudo"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column justify-content-center h-100">
                    <a href="" class="text-warning jogo-conteudo">{{$postagem->titulo}}</a>
                    <div class="d-flex">
                        <a href="" class="text-info ">By {{$postagem->autor}}</a> <span>- 4 minutos atras</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{$postagens->links()}}
    </div>
</main>

@endsection