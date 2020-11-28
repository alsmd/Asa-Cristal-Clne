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
          <td class="text-truncate"><a href="{{route('forum.jogo.categoria.postagem.show',[$postagem->forum->slug,$postagem->categoria->slug, $postagem->id])}}" class="text-light"  target="_blank">{{ $postagem->titulo}}</a></td>
          <td class="text-truncate"><a href="{{route('forum.jogo.show',[$postagem->forum->slug])}}" class="text-light"  target="_blank">{{ $postagem->forum->slug}}</a></td>
          <td class="text-truncate"><a href="{{route('forum.jogo.categoria.postagem.index',[$postagem->forum->slug,$postagem->categoria->slug ])}}" class="text-light" target="_blank" >{{$postagem->categoria->nome}}</a></td>
          <td class="text-truncate">{{ $postagem->created_at}}</td>
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