<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamesow-Clone</title>

    <!--Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!--FontAwesome -->
    <link rel="stylesheet" href="src/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <!--Icone na aba -->
    <link rel="shortcut icon" href="src/image/icon.jpg" >
    <!--Estilo costumizado -->
    <link rel="stylesheet" href="src/css/forum.css">

</head>
<body>
    <!-- Navbar -->
    <header class="bg-light">
        <div class="container ">
            <nav class="navbar navbar-light  navbar-expand-md">
            <!-- Navbar logo -->
            <a href="" class="navbar-brand "><img src="https://static.gamesow.com/br/images/logo.png" alt=""></a>
            
            <!-- Navbar button -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal"><span class="navbar-toggler-icon"></span></button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="menu-principal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="" class="nav-link">Principal</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Centro Pessoal</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Forúm</a></li>
                    <li class="nav-item"><a href="" class="nav-link">FAQ</a></li>
                </ul>
            </div>
            </nav>
        </div>
    </header>
    <!-- TABS -->
    <div class="container">
        <a href=""class="text-info">FÓRUM</a> <span class="text-info">» Página inicia</span>
    </div>

    <main class="container bg-light">
        <header id="main-header">
            <button class="btn btn-outline-primary">Novo</button>  Bem vindo Usuario, Sua última visita foi em 04:27 2020-10-26, <a href="">Postagens</a>, <a href="">Ver novo tópico</a>, <a href="">Marcar lido</a>

            <div class="d-flex justify-content-end">
                <small class="text-success">Hoje: 26, Ontem: 33, Membros: 211836</small>
            </div>
        </header>
        <h3 class="display-4 mt-2">Jogos</h3>

        <div id="jogos">
            <!-- Item -->
            <div class="row jogo text-light mb-3">
                <div class="col-md-8">
                   <div class="d-flex">
                        <img src="http://bbs.gamesow.com/attachments/month_1606/1606301437457fe061f07128b4.jpg" alt="" class="rounded">
                        <div class="d-flex flex-column ml-3">
                            <h3 class="m-0 d-inline"><a href="" class="text-warning">Asa de Cristal</a><small class="d-inline ml-1">(Hoje: <span class="text-warning">26</span>)</small></h3> 
                            <p class="lead m-0">O melhor MMORPG da Gamesow !!</p>
                            <p>Moderador</p>
                        </div>
                        <span class="float-right">14686 / 49619</span> 
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <a href="" class="text-warning">Titulo da ultima postagem do forum</a>
                        <div class="d-flex">
                            <a href="" class="text-dark ">By Usuario</a> <span>- 4 minutos atras</span>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Item -->
            <div class="row jogo text-light mb-3">
                <div class="col-md-8">
                   <div class="d-flex">
                        <img src="http://bbs.gamesow.com/attachments/month_1606/1606301437457fe061f07128b4.jpg" alt="" class="rounded">
                        <div class="d-flex flex-column ml-3">
                            <h3 class="m-0 d-inline"><a href="" class="text-warning">Asa de Cristal</a><small class="d-inline ml-1">(Hoje: <span class="text-warning">26</span>)</small></h3> 
                            <p class="lead m-0">O melhor MMORPG da Gamesow !!</p>
                            <p>Moderador</p>
                        </div>
                        <span class="float-right">14686 / 49619</span> 
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <a href="" class="text-warning">Titulo da ultima postagem do forum</a>
                        <div class="d-flex">
                            <a href="" class="text-dark ">By Usuario</a> <span>- 4 minutos atras</span>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </main>
    
</body>
</html>