@foreach($mensagens as $mensagem)
<!-- PM -->
<div class="col-12 pm px-0 py-2 d-flex align-items-start justify-content-between my-2">
    <div class="d-flex ">
        <a href="{{route('user.show',[$mensagem->user->id])}}"  target="_blank"><img src="{{asset('storage/'.$mensagem->user->foto)}}" alt="" height="100" style="border-radius: 50%;" class="mr-3 foto-perfil "></a>
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
    <nav aria-label="...">
    <ul class="pagination">

      @foreach($links as $link)
      <li class="page-item @if($link->active) active @endif">
        <a class="page-link " href="{{$link->url}}" >{{$link->label}}</a>
      </li> 
      @endforeach
    </ul>
  </nav>
</div>