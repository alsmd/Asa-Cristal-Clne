<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I Don't know</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/fontawesome/css/all.css">

<style>
    body{
        background: #24242d;
    }
    ul{
        list-style: none;
    }

    /* tamanho carosel */
    .carousel-item img{
        max-height: 400px;
    }
    /* item de cada jogo */
    .item-jogo,.item-lateral{
    position: relative;
    margin-top: 5px;
    }
    .item-jogo .links{
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(16, 15, 15,.3);
        transition: opacity .5s;
        opacity: 0;
    }
    .item-jogo:hover .links{
        opacity: 1;
    } 
    /* item lateral */

    .item-lateral:hover{
        cursor: pointer;
        padding: 3px !important;
    }
    /* icones */
    .fa-home, .fa-facebook,.fa-comments{
        font-size: 3em;
    }

    /* reescrevendo o offset */
    .offset-1{
        margin-left: 3.33333%;
    }
    principal{
        margin-left: 1%;
    }

</style>
</head>
<body>
    <!-- Navbar -->

    <header class="container">
        <nav class="navbar navbar-dark navbar-expand-sm">
            <a href="" class="navbar-brand"><img src="http://static.gamesow.com/br/images/logo.png" alt=""></a>
            
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="menu-principal">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Registrar</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Carousel -->
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="src/image/banner-1.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="src/image/banner-2.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
                <img src="src/image/banner-3.jpg" class="d-block w-100" alt="...">
            </div>

        </div>
    </div>

    <main class="container-lg mt-4">
        <div class="row  px-4">
            <!-- PRINCIPAL -->
            <div class="col-md-8 principal mb-4">
                <!-- Item -->
                <div class="row item-jogo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                        <img src="https://img.gamesow.com/image/2018/0309/1520575930.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6 col-12 d-flex flex-column justify-content-center align-items-center bg-info text-light p-0">
                        <h2>Asa de Cristal</h2>
                        <p>Aqui vai começar a sua jornada!</p>
                    </div>

                    <div class="links d-flex align-items-center justify-content-center">
                       <div class="">
                        <a href="google" class="btn btn-outline-light  p-3"> <i class="fas fa-home"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="fab fa-facebook"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="far fa-comments"></i></a>
                       </div>
                    </div>
                </div>
                
                  <!-- Item -->
                <div class="row item-jogo">
                    <div class=" col-lg-6 col-md-6 col-sm-6 col-12 p-0 order-last">
                        <img src="https://img.gamesow.com/image/2016/1117/1479434557.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6 col-12 d-flex flex-column justify-content-center align-items-center bg-info text-light p-0 order-first">
                        <h2>Asa de Cristal</h2>
                        <p>Aqui vai começar a sua jornada!</p>
                    </div>

                    <div class="links d-flex align-items-center justify-content-center">
                       <div class="">
                        <a href="google" class="btn btn-outline-light  p-3"> <i class="fas fa-home"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="fab fa-facebook"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="far fa-comments"></i></a>
                       </div>
                    </div>
                </div>

                 <!-- Item -->
                 <div class="row item-jogo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                        <img src="https://img.gamesow.com/image/2016/0729/1469776144.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6 col-12 d-flex flex-column justify-content-center align-items-center bg-info text-light p-0">
                        <h2>Asa de Cristal</h2>
                        <p>Aqui vai começar a sua jornada!</p>
                    </div>

                    <div class="links d-flex align-items-center justify-content-center">
                       <div class="">
                        <a href="google" class="btn btn-outline-light  p-3"> <i class="fas fa-home"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="fab fa-facebook"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="far fa-comments"></i></a>
                       </div>
                    </div>
                </div>


                 <!-- Item -->
                 <div class="row item-jogo">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 order-last">
                        <img src="https://img.gamesow.com/image/2016/0308/1457436842.jpg" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6 col-12 d-flex flex-column justify-content-center align-items-center bg-info text-light p-0 order-first">
                        <h2>Asa de Cristal</h2>
                        <p>Aqui vai começar a sua jornada!</p>
                    </div>

                    <div class="links d-flex align-items-center justify-content-center">
                       <div class="">
                        <a href="google" class="btn btn-outline-light  p-3"> <i class="fas fa-home"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="fab fa-facebook"></i></a>
                        <a href="google"  class="btn btn-outline-light  p-3"> <i class="far fa-comments"></i></a>
                       </div>
                    </div>
                </div>

                 
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
                <!-- <ul class="list-group">
                    <li class="list-item item-lateral"><img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded"></li>
                    <li class="list-item item-lateral"><img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded"></li>
                    <li class="list-item item-lateral"><img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded"></li>
                    <li class="list-item item-lateral"><img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded"></li>
                    <li class="list-item item-lateral"><img src="https://img.gamesow.com/image/2016/1227/1482832598.jpg" alt="" width="100%" class="rounded"></li>
                </ul> -->
            </div>
        </div>
    </main>
</body>
</html>