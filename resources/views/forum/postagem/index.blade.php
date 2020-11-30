@extends('layouts.layout2')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="{{route('forum.index')}}" class="text-info">Página inicial</a > »<a href="{{route('forum.jogo.show',[$slug_forum])}}"class="text-info"> {{$forum_nome}}</a> <span class="text-info">» {{$categoria_nome}}</span>
</div>

<main class="container bg-black text-light rounded pb-1">
    <header id="main-header" class="mb-2 border-bottom border-secondary">
        <h3 class="text-info display-4">{{$categoria_nome}}</h3>    
        <p>Moderado: </p> 
        <a href="{{route('forum.jogo.categoria.postagem.create',[$slug_forum,$slug_categoria])}}" class="btn btn-outline-primary ">Novo</a>

    </header>
    <!-- Lista Dos forum disponiveis -->
    <div id="jogos mx-2">
        <!-- Forums desponiveis no DB -->
        @foreach($postagens as $postagem)
        <div class="row jogo text-light mb-3 mx-0">
            <div class="col-md-8">
                <div class="d-flex">
                    <a href="{{route('user.show',[$postagem->user->id])}}"  target="_blank"><img src="{{asset('storage/'.$postagem->user->foto )}}" alt="" class="rounded align-self-stretch border border-secondary" width="135" height="103" ></a> 
                    <div class="d-flex flex-column ml-3">
                        <h3 class="m-0 d-inline jogo-titulo"><a href="{{route('forum.jogo.categoria.postagem.show',[$slug_forum,$slug_categoria,$postagem->id])}}" class="text-warning">{{$postagem->titulo}}</a></h3> 
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