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
<div class="d-flex justify-content-center">
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