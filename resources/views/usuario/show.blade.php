@extends('layouts.layout2')
@section('head')
    <link rel="stylesheet" href="src/css/user_perfil.css">
@endsection
@section('content')
<!-- TABS -->
<div class="container text-info">
    <a href="{{route('forum.index')}}"class="text-info">FÓRUM</a> » <a href="#" class="text-info">{{$user->name}}'s perfil</a >
</div>

<main class="container-md bg-black text-light rounded mt-3 d-flex flex-column justify-content-between">
    <div class="row">

        <div class="col-md-3 d-flex flex-column align-items-center ">
            <img src="{{asset('storage/'.$user->foto)}}" alt="" class="img-fluid">
            
            <div class="d-flex flex-column align-items-center mt-2">
                @if($user->id != auth()->user()->id)
                    <a href="#" class="text-info" onclick="document.querySelector('#chat' + <?php echo $user->id;?>).submit()">Enviar PM</a>
                    <form action="{{route('chat')}}" class="d-none" method="post" id="chat{{$user->id}}">
                        @csrf
                        <input type="text" name="user_selecionado" id="" value="{{$user->id}}">
                    </form>
                    <a href="" class="d-block text-secondary"> Adicionar Amigo</a>
                @endif
                <a href="" class="d-block text-secondary"> Utilize Acessório</a>
                <a href="" class="d-block text-secondary"> Procurar Posts</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="cabecalho border-bottom py-2 pl-2">
                <h5 class="display-4">{{$user->name}}</h5>
                <p class="text-warning">Gênero:	<span class="text-info">Masculino</span></p>
                <p class="text-warning">Aniversário:	<span class="text-info">18-10-1989</span></p>
                <p class="text-warning">Linkedin: <span class="text-info"><a href="{{$user->linkedin}}"class="text-info" target="_blank">{{$user->name}}</a></span></p>
            </div>
            <div class="body border-bottom py-2 pl-2">
                <h4 class="">Grupo de Usuário:<span class="text-info"> Novato Rank: 1</span></h4> 
                <div class="row">
                    <div class="col-md-6  d-flex flex-column justify-content-center  p-4">
                        <p class="text-warning">Postar classificação:<span class="text-info"> Iniciante Rank: 1</span></p>
                        <p class="text-warning">Tópico: <span class="text-info">20 pedaço(de todos os posts 0.01%)</span> </p>
                        <p class="text-warning">Tempo Online: <span class="text-info">Total online 19.83 Horas, e este mês 0  Horas Rank:  1 (Atualização após 1 horas) </span></p>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                        <p class="text-warning">Data de Registro: <span class="text-info">{{$user->created_at}}</span></p>
                        <p class="text-warning">Ultima Visita: <span class="text-info">Ante Ontem 00:38</span></p>
                        <p class="text-warning">Últma postagem: <span class="text-info">6 DiaAntes 05:48</span></p>
                    </div>
                </div>
                <div class="form-group">
                    <h6 class="display-4 mb-2">Biografia</h6>
                    <div class="p-4 bg-dark text-light rounded">{{$user->biografia}}</div>
                </div>
            </div>
            <div class="footer py-2 pl-2">
                <h4>Creditos: 0</h4>
            </div>
        </div>
    </div>
   
</main>

@endsection