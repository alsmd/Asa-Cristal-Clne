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
                <img src="{{asset('storage/'.$user_selecionado->foto)}}" alt="" width="50" height="50" style="border-radius:50%" class="mr-2">
                <h3>{{$user_selecionado->name}}</h3>
            </div>
            <div class="menus">
                <button class="btn btn-outine-dark"><i class="fas fa-cog"></i></button>
            </div>
        </div>
        <div class="chat text-dark m-0">
            @foreach($mensagens as $mensagem)
            @if($mensagem->user->id == auth()->user()->id)
            <!-- Mensagem Enviada -->
            <div class="mensagem-enviada">
                <div class="d-inline-block bg-success mensagem">{{$mensagem->mensagem}}</div>
            </div> 
            @endif
            @if($mensagem->user->id != auth()->user()->id)
            <!-- Mensagem Recebida -->
            <div class="mensagem-recebida">
                <div class="d-inline-block bg-warning mensagem">{{$mensagem->mensagem}}</div>
            </div>
            
            @endif
            @endforeach

        </div>
        <div class="envio">
            <div class="input-group">
                <input class="form-control form-control-lg " type="text" placeholder="Enviar" id="mensagem">
                <div class="input-group-append">
                    <button class="input-group-text btn-info" type="button" id="enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Model para mensagem enviada -->
        <!-- Mensagem Enviada -->
        <div class="model-mensagem-enviada d-none">
            <div class="mensagem-enviada">
                <div class="d-inline-block bg-success mensagem"></div>
            </div> 
        </div>
</main>
<script>
   let chat_id = <?php echo $chat_id ?>;
   let id_user = <?php echo auth()->user()->id ?>;
   let url = '';
   $("#enviar").on('click',function(){
       let mensagem = $("#mensagem").val();
       $("#mensagem").val('')
       $.ajax({
           type:'post',
           data: `chat_id=${chat_id}&&id_user=${id_user}&&mensagem=${mensagem}`,
           url: 'chat/store',
           headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: (resposta)=>{
               $('.model-mensagem-enviada .mensagem').html(resposta.mensagem);
               let model_mensagem = $('.model-mensagem-enviada').html();
               $('.chat').append(model_mensagem);
           },
           error: (resposta)=>{
               console.log(resposta)
           }
       })
   })
</script>
@endsection

