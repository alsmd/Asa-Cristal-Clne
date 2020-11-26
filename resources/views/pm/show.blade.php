@extends('layouts.layout2')
@section('head')
<link rel="stylesheet" href="src/css/pm.css">
@endsection
@section('content')

<div class="container my-2">
    <a href="{{route('forum.index')}}"class="text-info">FÓRUM</a>  <span class="text-info">» Private Conversation</span>
</div>

<main class="container bg-black text-light rounded p-0">
    <div class="d-flex flex-column">
        <div class="chat-header py-3 px-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{auth()->user()->foto}}" alt="" width="50" height="50" style="border-radius:50%" class="mr-2">
                <h3>{{auth()->user()->name}}</h3>
            </div>
            <div class="menus">
                <button class="btn btn-outine-dark"><i class="fas fa-cog"></i></button>
            </div>
        </div>
        <div class="chat text-dark m-0">
            <!-- Mensagem Recebida -->
            <div class="mensagem-recebida">
                <div class="d-inline-block bg-warning mensagem">Mensagem enviada Mensagem enviada Mensagem enviada Mensagem enviada Mensagem enviadav Mensagem enviada Mensagem enviada</div>
            </div>
            <!-- Mensagem Enviada -->
            <div class="mensagem-enviada">
                <div class="d-inline-block bg-success mensagem">Mensagem recebida</div>
            </div>

            <div class="mensagem-recebida">
                <div class="d-inline-block bg-warning mensagem">Mensagem enviada Mensagem enviada Mensagem enviada Mensagem enviada Mensagem enviadav Mensagem enviada Mensagem enviada</div>
            </div>
            <div class="mensagem-enviada">
                <div class="d-inline-block bg-success mensagem">Mensagem recebida</div>
            </div>
        </div>
        <div class="envio">
            <div class="input-group">
                <input class="form-control form-control-lg " type="text" placeholder="Enviar" aria-label="Search">
                <div class="input-group-append">
                    <button class="input-group-text btn-info" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
  
    
</main>
<script>
   
</script>
@endsection

