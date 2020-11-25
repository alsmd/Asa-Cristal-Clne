<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamesow-Clone</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!--FontAwesome -->
    <link rel="stylesheet" href="http://localhost:8080/src/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <!--Icone na aba -->
    <link rel="shortcut icon" href="http://localhost:8080/src/image/icon.jpg" >
    <!--Estilo costumizado -->
    <link rel="stylesheet" href="http://localhost:8080/src/css/forum.css">
    @yield('head')
</head>
<body class="bg-dark" >
    <!-- Navbar -->
    <header class="bg-black">
        <div class="container ">
            <nav class="navbar navbar-dark  navbar-expand-md">
            <!-- Navbar logo -->
            <a href="/" class="navbar-brand "><img src="https://static.gamesow.com/br/images/logo.png" alt=""></a>
            
            <!-- Navbar button -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal"><span class="navbar-toggler-icon"></span></button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="menu-principal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{route('forum.index')}}" class="nav-link">Principal</a></li>
                    @auth
                    <li class="nav-item"><a href="/perfil" class="nav-link text-light">{{auth()->user()->name}}</a></li>
                    @endauth
                    <li class="nav-item"><a href="" class="nav-link">Forúm</a></li>
                    <li class="nav-item"><a href="" class="nav-link">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="document.querySelector('.sair-forum').submit();">Sair</a></li>
                    <form action="{{route('logout')}}" method="post" class="sair-forum d-none">
                        @csrf
                    </form>
                </ul>
            </div>
            </nav>
        </div>
    </header>
    @include('flash::message')

    @yield('content')
    
    <!-- FOOTER -->
    <footer class=" p-4 border border-dark bg-black text-light mt-4 rounded">
            <div class="container-lg">
                <div class="row ">
                    <div class="col-md-3 col-6 text-truncate">
                        <a href="" class="text-info ">Sobre nós</a>
    
                    </div>
                    <div class="col-md-3 col-6 text-truncate">
                    <a href="" class="text-info ">Política de Privacidade</a>
                        
                    </div>
                    <div class="col-md-3 col-6 text-truncate">
                        <a href="" class="text-info ">Termos de Serviço</a>
                        
                    </div>
                    <div class="col-md-3 col-6 text-truncate">
                        <a href="" class="text-info ">Política de Reembolso</a>
                    </div>
                </div>
            </div>
    </footer>
</body>
</html>