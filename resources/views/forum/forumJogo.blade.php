@extends('forum.layout')
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> <span class="text-info">» {{$forum_nome}}</span>
</div>

<main class="container bg-black text-light rounded">
    <header id="main-header ">
        <button class="btn btn-outline-primary">Novo</button>  Bem vindo Usuario, Sua última visita foi em 04:27 2020-10-26, <a href="">Postagens</a>, <a href="">Ver novo tópico</a>, <a href="">Marcar lido</a>

        <div class="d-flex justify-content-end">
            <small class="text-success">Hoje: 26, Ontem: 33, Membros: 211836</small>
        </div>
    </header>
    <h3 class="display-4 mt-2 mb-4">Categorias</h3>

    
    <!-- Lista Dos forum disponiveis -->
    <div id="jogos mx-2">
        <!-- Forums desponiveis no DB -->
        @foreach($categorias as $categoria)
        <div class="row jogo text-light mb-3 mx-0">
            <div class="col-md-8">
                <div class="d-flex">
                    <img src="{{$categoria->foto}}" alt="" class="rounded align-self-stretch border" width="135" height="103" >
                    <div class="d-flex flex-column ml-3">
                        <h3 class="m-0 d-inline jogo-titulo"><a href="/forum/{{$slug_forum}}/{{$categoria->slug}}" class="text-warning">{{$categoria->nome}}</a></h3> 
                        <p class="lead m-0 jogo-conteudo"></p>
                        <div class="dropdown">
                            <button class="dropdown-toggle btn btn-secondary btn-sm" data-toggle="dropdown" id="dropdown-jogo1-button" aria-haspopup="true" aria-expanded="false">Moderador</button>

                            <div class="dropdown-menu" arialabelledby="dropdown-jogo1-button">
                                <a href="" class="dropdown-item">Moderador</a>
                                <a href="" class="dropdown-item">Moderador</a>
                                <a href="" class="dropdown-item">Moderador</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column justify-content-center h-100">
                    <a href="" class="text-warning jogo-conteudo">Titulo da ultima postagem do forum</a>
                    <div class="d-flex">
                        <a href="" class="text-info ">By Usuario</a> <span>- 4 minutos atras</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>

    <!-- Footer do conteudo principal -->
    <div class="container-footer p-3 d-flex my-2">
        Membros Online - 29 Onlines - 17 Membros(0 Invisíveis), 12 Clientes - Máximo de linhas é 252 em 28-12-2016.
    </div>
</main>
@endsection