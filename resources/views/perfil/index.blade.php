@extends('layouts.layout2')
@section('head')
<link rel="stylesheet" href="src/css/perfil.css">
@endsection
@section('content')

<div class="container">
    <a href=""class="text-info">FÓRUM</a> <span class="text-info">» Perfil Pessoal</span>
</div>

<main class="container bg-black text-light rounded p-0 ">
    
   
   <div class="row m-0 flex-column ">
      <!--  Menu lateral -->
       <div class="col-12 sidebar mb-2">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action  list-group-item-secondary active  flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">home</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">profile</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">messages</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary flex-grow-1 d-flex align-items-center text-center justify-content-center" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">settings</a>
            </div>
       </div>
       <div class="col-12" >
           <!-- Conteudo -->
            <div class="tab-content" id="nav-tabContent">
                <!-- Home -->
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="row ">
                        <!-- Postagens -->
                        <div class="col-lg-6 postagens">
                            <h3 class="text-center my-4 text-warning">Postagens</h3>
                            <table class="table table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Jogo</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Ultimo Comentario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>Titulo</td>
                                      <td>Jogo</td>
                                      <td>Categoria</td>
                                      <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                        <!-- Comentarios -->
                        <div class="col-lg-6 comentarios">
                            <h3 class="text-center my-4 text-warning">Comentarios</h3>
                            <table class="table table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Jogo</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Ultimo Comentario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>Titulo</td>
                                      <td>Jogo</td>
                                      <td>Categoria</td>
                                      <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                    <tr>
                                        <td>Titulo</td>
                                        <td>Jogo</td>
                                        <td>Categoria</td>
                                        <td>Ultimo Comentario</td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <!-- Profile -->
                <div class="tab-pane fade conteudo" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
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
                <div class="tab-pane fade conteudo" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    conteudo messages
                </div>  
                <!-- Settings -->
                <div class="tab-pane fade conteudo" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    conteudo settings
                </div>  
            </div>
       </div>
   </div>
   
    
</main>
<script>
   
</script>
@endsection

