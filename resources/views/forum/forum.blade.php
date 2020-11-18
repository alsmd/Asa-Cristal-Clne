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
    <link rel="stylesheet" href="../src/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <!--Icone na aba -->
    <link rel="shortcut icon" href="../src/image/icon.jpg" >
    <!--Estilo costumizado -->
    <link rel="stylesheet" href="../src/css/forum.css">

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
    <div class="container text-info">
        <a href=""class="text-info">FÓRUM</a> » <a href="/forum" class="text-info">Página inicial</a href="/forum"> <span class="text-info">» Jogo</span>
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
                        <img src="../src/image/asa-de-cristal.jpg" alt="" class="rounded align-self-stretch" width="135" height="103" >
                        <div class="d-flex flex-column ml-3">
                            <h3 class="m-0 d-inline jogo-titulo"><a href="/forum/{{$slug}}/{{$categoria->slug}}" class="text-warning">{{$categoria->nome}}</a></h3> 
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