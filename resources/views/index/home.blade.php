@extends('index.login')
@extends('index.registrar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamesow-Clone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/fontawesome/css/all.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/header.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link rel="shortcut icon" href="src/image/icon.jpg" >


<style>
   
    
</style>
</head>
<body>
    <!-- Navbar -->
    <header class="container" id="header">
        <nav class="navbar navbar-dark navbar-expand-sm">
            <a href="" class="navbar-brand"><img src="http://static.gamesow.com/br/images/logo.png" alt=""></a>
            
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="menu-principal">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item"><a href="#" class="nav-link" id="btn-login">Login</a></li>
                    <li class="nav-item divisao d-none d-sm-inline-block"><a href="" class="nav-link"></a></li>
                    <li class="nav-item"><a href="#" class="nav-link" id="btn-registrar">Registrar</a></li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bem vindo, {{auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/perfil">Perfil</a>
                            <a class="dropdown-item" href="#">Recarga</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="document.querySelector('.sair-forum').submit();">Sair</a>
                        </div>
                    </li>
                    <form action="{{route('logout')}}" method="post" class="sair-forum d-none">
                        @csrf
                    </form>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <!-- Carousel -->
    <div class="carousel slide" data-ride="carousel" id="banner">

        <ol class="carousel-indicators">
            <li data-target="#banner" data-slide-to="0" class="active"></li>
            <li data-target="#banner" data-slide-to="1"></li>
            <li data-target="#banner" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="src/image/banner-4.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="src/image/banner-5.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="src/image/banner-6.jpg" class="d-block w-100" alt="...">
            </div>

        </div>

        <a class="carousel-control-prev" href="#banner" role="prev" data-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>

        <a class="carousel-control-next" href="#banner" role="next" data-slide="next">
            <span class="carousel-control-next-icon " aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>


    </div>
    <!-- Conteudo principal -->
    <main class="container-lg my-4">
        <div class="row  px-4">
            <!-- PRINCIPAL -->
            <div class="col-md-8 principal mb-4">
                <!-- Jogos salvos no banco de dados -->
                @foreach($jogos as $jogo)
                <div class="row item-jogo">
                    <!-- Banner -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 border-esquerda">
                        <img src="{{$jogo->foto}}" alt="" class="w-100">
                    </div>
                    <!-- Descrição -->
                    <div class="col-lg-6  col-md-6 col-sm-6 col-12 d-flex flex-column justify-content-center align-items-center bg-info text-light p-0 border-direita">
                        <h2>{{$jogo->nome}}</h2>
                        <p>{{$jogo->descricao}}</p>
                    </div>
                    <!-- links -->
                    <div class="links d-flex align-items-center justify-content-center">
                       <div class="">
                        <a href="#" class="btn btn-outline-light  p-3"> <i class="fas fa-home"></i></a>
                        <a href="#"  class="btn btn-outline-light  p-3"> <i class="fab fa-facebook"></i></a>
                        <a href="/forum/{{$jogo->forum()->first()->slug}}"  class="btn btn-outline-light  p-3"> <i class="far fa-comments"></i></a>
                       </div>
                    </div>
                </div>
                
                @endforeach

                 

                 
            </div>
            <!-- LATERAL -->
            <div class="col-md-3 secundario offset-1">
                <div class="row justify-content-between">
                    <div class="col-md-12 col-sm-6  item-lateral p-0">
                        <img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded">
                    </div>
                    <div class="col-md-12 col-sm-6  item-lateral p-0">
                        <img src="https://img.gamesow.com/image/2016/0818/1471516568.jpg" alt="" width="100%" class="rounded">
                    </div>
                    <div class="col-md-12 col-sm-6  item-lateral p-0">
                        <img src="https://img.gamesow.com/image/2016/0309/1457493072.png" alt="" width="100%" class="rounded">
                    </div>
                    <div class="col-md-12 col-sm-6  item-lateral p-0">
                        <img src="https://img.gamesow.com/image/2015/0701/1435733586.jpg" alt="" width="100%" class="rounded">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- FOOTER -->
    <footer>
        <!-- AREA 1 --> 
        <div class="jumbotron m-0">
            <div class="container-lg ">
                <div class="row justify-content-between">
                    <div class="col-md-6 footer-area-links1 ">
                        <h2>GAMESOW</h2>
    
                        <a href="" class="nav-link foot-link">Fórum</a>
                        <a href="" class="nav-link foot-link">Facebook</a>
                        <a href="" class="nav-link foot-link">Luz da Escuridão</a>
                        <a href="" class="nav-link foot-link">Asa de Cristal</a>
                        <a href="" class="nav-link foot-link">Gamesow Espanõl</a>
                    </div>
                    <div class="col-md-5">
                        <h2>CORPORATE</h2>
    
                        <a href="" class="nav-link foot-link">FAQ</a>
                        <a href="" class="nav-link foot-link">Politica de Reembolso</a>
                        <a href="" class="nav-link foot-link">Politica de Privacidade</a>
                        <a href="" class="nav-link foot-link">Sobre nós</a>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- AREA 2 -->
        <div class="d-flex justify-content-center  py-4 last">
            <h5 class="lead"style="color:gray;" >Projeto  criado para fins de estudo.  <a href="https://github.com/alsmd/Gamesow-Clone" target="_blank" rel="noopener noreferrer" class='nav-link d-inline px-0 text-warning'>GitHub</a></h5> 
    
        </div>
    </footer>

   
</body>
</html>
<script>
    $(document).ready(()=>{
        /*  abrir login */
        $("#btn-login").on('click',()=>{
            $('.login').toggleClass('esconder-login');
        });
    
        /*  abrir registrar */
        $("#btn-registrar").on('click',()=>{
            $('.registrar').toggleClass('esconder-login');
        });
        //Trocar de registrar para logar e vice versa
        $(".mudar-de-login").on('click',()=>{
            $('.registrar').toggleClass('esconder-login');
            $('.login').toggleClass('esconder-login');
        })

    })



</script>