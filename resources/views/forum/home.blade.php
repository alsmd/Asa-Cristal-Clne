@extends('forum.layout')

@section('content')
<!-- TABS -->
<div class="container">
    <a href=""class="text-info">FÓRUM</a> <span class="text-info">» Página inicial</span>
</div>

<main class="container bg-black text-light rounded">
    <header id="main-header ">
        <button class="btn btn-outline-primary">Novo</button>  Bem vindo Usuario, Sua última visita foi em 04:27 2020-10-26, <a href="">Postagens</a>, <a href="">Ver novo tópico</a>, <a href="">Marcar lido</a>

        <div class="d-flex justify-content-end">
            <small class="text-success">Hoje: 26, Ontem: 33, Membros: 211836</small>
        </div>
    </header>
    <h3 class="display-4 mt-2 mb-4">Jogos</h3>

    
    <!-- Lista Dos forum disponiveis -->
    <div id="jogos mx-2">

        <!-- Forums desponiveis no DB -->
        @foreach($forums as $forum)
        <div class="row jogo text-light mb-3 mx-0">
            <div class="col-md-8">
                <div class="d-flex">
                    <img src="{{$forum->foto}}" alt="" class="rounded align-self-stretch" width="135" height="103" >
                    <div class="d-flex flex-column ml-3">
                        <h3 class="m-0 d-inline jogo-titulo"><a href="/forum/{{$forum->slug}}" class="text-warning">{{$forum->nome}}</a><small class="d-none d-lg-inline ml-1">(Hoje: <span class="text-warning">26</span>)</small></h3> 
                        <p class="lead m-0 jogo-conteudo">{{$forum->frase}}</p>
                        <div class="dropdown">
                            <button class="dropdown-toggle btn btn-secondary btn-sm" data-toggle="dropdown" id="dropdown-jogo1-button" aria-haspopup="true" aria-expanded="false">Moderador</button>

                            <div class="dropdown-menu" arialabelledby="dropdown-jogo1-button">
                                <a href="" class="dropdown-item">Moderador</a>
                                <a href="" class="dropdown-item">Moderador</a>
                                <a href="" class="dropdown-item">Moderador</a>
                            </div>
                        </div>  
                    </div>
                    <span class="float-right d-none d-lg-inline">14686 / 49619</span> 
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
    <div class="d-flex justify-content-center mt-3">
        {{$forums->links()}}
    </div>
    <!-- Footer do conteudo principal -->
    <div class="container-footer p-3 d-flex my-2">
        Membros Online - 29 Onlines - 17 Membros(0 Invisíveis), 12 Clientes - Máximo de linhas é 252 em 28-12-2016.
    </div>
    <!-- Siginificado dos itens -->
    <div class="icones-significados p-3 border row mx-0">
        <div class="col-lg-3 col-md-6">
            <i class="fas fa-user text-danger mx-2"></i><span class="mr-4">Administrador</span>

        </div>
        <div class="col-lg-3 col-md-6">
            <i class="fas fa-user text-warning  mx-2"></i> <span class="mr-4">Super Moderador</span>
            
        </div>
        <div class="col-lg-3 col-md-6 d-flex text-truncate">
            <i class="fas fa-user text-info  mx-2"></i><span class="mr-4  ">Moderado</span>       
            
        </div>
        <div class="col-lg-3 col-md-6">
            <i class="fas fa-user text-sucess  mx-2"></i><span>Membro</span>   
        </div>
    </div>

    <!-- Usuarios logados -->
    <div class="usuarios-ativos p-3 border row mx-0">
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        <!-- Usuario -->
        <div class="col-md-3 mb-2 col-sm-4 col-6 text-truncate">
            <i class="fas fa-user text-success mx-2"></i><span class="mr-4">Fernando meideira</span>
        </div>
        
        
        

    </div>

</main>
    @endsection