@extends('layouts.layout2')
@section('head')
<link rel="stylesheet" href="src/css/configuracao.css">
@endsection
@section('content')

<div class="container">
    <a href="{{route('forum.index')}}"class="text-info">FÓRUM</a> <span class="text-info">» Configurações</span>
</div>

<main class="container bg-black text-light rounded p-0 ">
    
   
   <div class="row m-0 flex-column ">
      <!--  Menu Horizontal -->
       <div class="col-12 sidebar mb-2">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action  list-group-item-secondary active  flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">profile</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Mensagens</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-users-list" data-toggle="list" href="#list-users" role="tab" aria-controls="users">Usuarios</a>
            </div>
       </div>
       <div class="col-12" >
           <!-- Conteudo -->
            <div class="tab-content" id="nav-tabContent">
                <!-- Home -->
                <div class="tab-pane fade show active " id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="row ">
                        <!-- Postagens -->
                        <div class="col-lg-6 postagen aba" id="postagem-list">
                            <h3 class="text-center my-4 text-warning titulo">Postagens</h3>
                            <div id="tabela-postagem-list">
                                <table class="table table-hover table-dark ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Jogo</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($postagens as $postagem)
                                        <tr >
                                          <td class="text-truncate"><a href="{{route('forum.jogo.categoria.postagem.show',[$postagem->forum->slug,$postagem->categoria->slug, $postagem->id])}}" class="text-light"  target="_blank">{{$postagem->titulo}}</a></td>
                                          <td class="text-truncate"><a href="{{route('forum.jogo.show',[$postagem->forum->slug])}}" class="text-light"  target="_blank">{{$postagem->forum->slug}}</a></td>
                                          <td class="text-truncate"><a href="{{route('forum.jogo.categoria.postagem.index',[$postagem->forum->slug,$postagem->categoria->slug ])}}" class="text-light" target="_blank" >{{$postagem->categoria->nome}}</a></td>
                                          <td class="text-truncate">{{$postagem->created_at}}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                </table>
                                <div class="d-flex justify-content-center">{{$postagens->links()}}</div>

                            </div>

                        </div>
                        <!-- Comentarios -->
                        <div class="col-lg-6 comentarios aba pb-2" id="comentario-list">
                            <h3 class="text-center my-4 text-warning">Comentarios</h3>
                            <div id="tabela-comentario-list">
                                <table class="table table-hover table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Postagem</th>
                                            <th scope="col">Jogo</th>
                                            <th scope="col">Comentario</th>
                                            <th scope="col">Dono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comentarios as $comentario)
                                        <tr>
                                          <td class="text-truncate"><a href="{{route('forum.jogo.categoria.postagem.show',[$comentario->postagem->forum->slug,$comentario->postagem->categoria->slug, $comentario->postagem->id])}}" class="text-light"  target="_blank">{{$comentario->postagem->titulo}}</a></td>
                                          <td class="text-truncate"><a href="{{route('forum.jogo.show',[$comentario->postagem->forum->slug])}}" class="text-light"  target="_blank">{{$comentario->postagem->forum->slug}}</a></td>
                                          <td class="text-truncate">{{$comentario->conteudo}}</td>
                                          <td class="text-truncate">{{$comentario->postagem->user->name}}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                </table>
                                <div class="d-flex justify-content-center">{{$comentarios->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Profile -->
                <div class="tab-pane fade conteudo " id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <!-- Informações opcionais -->
                    <form action="" class="">
                        <div class="d-flex justify-content-center mb-2">
                            <label for="foto" id="foto-perfil-background"><img src="{{auth()->user()->foto}}" alt="" width="150" height="150" style="border-radius: 50%;" class="border border-secondary foto-perfil"> <i class="fas fa-camera "></i></label>
                        </div>
                        <div class="custom-file mb-2 d-none">
                            <input type="file" class="custom-file-input" id="foto" required>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Sobrenome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="url" class="form-control" name="linkedin" id="linkedin" placeholder="utilize http://">
                        </div>
                        <div class="form-group">
                            <label for="name">Biografia</label>
                            <textarea id=""rows="5" class="form-control" name="name" id="name" placeholder="Mostre para o mundo quem você é!"></textarea>
                        </div>
                        <button class="btn btn-success btn-lg btn-block">Salvar</button>
                    </form>
                </div> 
                <!-- Messages --> 
                <div class="tab-pane fade  p-sm-4 aba" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list" >
                    <!-- header -->
                    <div class="d-flex justify-content-between">
                        <h1 class="logo-pm">PM</h1>
                        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                            <div class="input-group">
                                <input class="form-control form-control-sm " type="text" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="input-group-text btn-info" type="button"><i class="fas fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Menu -->
                    <ul class="nav justify-content-center mensagens-nav">
                        <li class="nav-item">
                          <a class="nav-link active  text-warning " href="#">Não lidas</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  text-warning" href="#">Lidas</a>
                        </li>
                    </ul>

                   <!--  Area de PM's -->
                   <div class="pms row m-0">
                        @foreach($mensagens as $mensagem)
                        <!-- PM -->
                        <div class="col-12 pm px-0 py-2 d-flex align-items-start justify-content-between my-2">
                            <div class="d-flex ">
                                <img src="{{auth()->user()->foto}}" alt="" height="100" style="border-radius: 50%;" class="mr-3 foto-perfil ">
                                <div class="pm-informacoes-user">
                                    <h3 class="text-truncate">{{$mensagem->user->name}}</h3>
                                    <p class="text-truncate m-0 p-0 ">{{$mensagem->mensagem}}</p>
                                    <small class="text-secondary">{{$mensagem->created_at}}</small>
                                    <a href="#" class="text-info" onclick="document.querySelector('#chat' + <?php echo $mensagem->user->id;?>).submit()">vizualizar</a>
                                    <form action="{{route('chat')}}" class="d-none" method="post" id="chat{{$mensagem->user->id}}">
                                        @csrf
                                        <input type="text" name="user_selecionado" id="" value="{{$mensagem->user->id}}">
                                    </form>
                                </div>
                            </div>
                            <button class="btn btn-dark rounded"><i class="fas fa-times"></i></button>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center w-100">
                            {{$mensagens->links()}}
                        </div>
                   </div>
                </div>  
                <!-- Todos Usuarios -->
                <div class="tab-pane fade conteudo aba" id="list-users" role="tabpanel" aria-labelledby="list-users-list" >
                    <!-- header -->
                    <div class="d-flex justify-content-between">
                        <h1 class="logo-pm">Usuarios</h1>
                        <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                            <div class="input-group">
                                <input class="form-control form-control-sm " type="text" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="input-group-text btn-info" type="button"><i class="fas fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Menu -->
                    <ul class="nav justify-content-center mensagens-nav">
                        <li class="nav-item">
                          <a class="nav-link active  text-warning" href="#">Amigos</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link  text-warning" href="#">Desconhecidos</a>
                        </li>
                    </ul>
                    <!--  Usuarios -->
                   <div class="pms row m-0">
                        @foreach($users as $user)
                        <!-- Usuario -->
                        <div class="col-12 pm px-0 py-2 d-flex align-items-start justify-content-between my-2">
                            <div class="d-flex ">
                                <img src="{{auth()->user()->foto}}" alt="" height="100" style="border-radius: 50%;" class="mr-3 foto-perfil ">
                                <div class="pm-informacoes-user">
                                    <h3 class="text-truncate">{{$user->name}}</h3>
                                    <p class="text-truncate m-0 p-0 ">{{$user->name}}</p>
                                    <small class="text-secondary">{{$user->created_at}}</small>
                                    <a href="#" class="text-info" onclick="document.querySelector('#chat' + <?php echo $user->id;?>).submit()">vizualizar</a>
                                    <form action="{{route('chat')}}" class="d-none" method="post" id="chat{{$user->id}}">
                                        @csrf
                                        <input type="text" name="user_selecionado" id="" value="{{$user->id}}">
                                    </form>
                                </div>
                            </div>
                            <button class="btn btn-dark rounded"><i class="fas fa-times"></i></button>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center w-100">
                            {{$users->links()}}
                        </div>
                   </div>
                </div>  
            </div>
       </div>
   </div>
   
    
</main>
<script>
   $(document).ready(function(){
    $(document).on('click','.pagination a',function(e){
        let aba = $(this).closest('.aba').attr('id');
        $("#tabela-"+aba).html('<div class="d-flex w-100 justify-content-center align-items-center"><img src="https://astelbg.com/wp-content/uploads/2019/10/loading.gif" style="max-width:200px;height:auto;"></div>');

        console.log(aba);
        getData($(this).attr('href').split('page=')[1],aba);
        e.preventDefault();
    });
   });
   //recupera a nova os dados da nova paginação no DB
   function getData(page,aba){
       $.ajax({
           url: `?page=${page}&&aba=${aba}`,
           dataType: 'json'
       }).done(function(data){
        let links = JSON.stringify(data.links);
        let dados = JSON.stringify(data.data);
        putNewContent(aba,dados,links);
       }).fail(function(data){
        console.log(data)

       });
   }
   //coloca o novo conteudo na tela
   function putNewContent(aba,dados,links){
        //let t = $('#'+tabela + ' table');
        $.ajax({
            type: 'POST',
            url:'/components/'+aba,
            data:{
                'dados':dados,
                'links': links
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(data){
            $("#tabela-"+aba).html(data);
        }).fail(function(data){
            console.log(data)
        })
   }
</script>
@endsection

