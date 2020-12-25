@extends('layouts.layout2')
@section('content')


<main class="container bg-black text-light rounded mt-3">
    <div class="row mt-3">

        <div class=" d-flex flex-column col-md-3">
            <h3 class="text-center display-4">Gerenciamento</h3>

            <!-- CRUD JOGO -->
            <div class="jogo_crud">
                <h3 class="text-center">Jogo</h3>
                <div>
                <!-- CRIAR JOGO -->
                    <a href="{{route('admin.jogo.create')}}" class="btn btn-outline-success active d-block">Criar Jogo</a>
                </div>
                <!--  EDITAR JOGO -->
                <form action="{{route('admin.jogo.edit',['0'])}}" class="form-group d-flex mb-0">
                    @csrf
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;" required>
                        @foreach($jogos as $jogo)
                            <option value="{{$jogo->id}}">{{$jogo->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-info" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Editar</button>
                </form>
                <!-- REMOVER JOGO -->
                <form action="{{route('admin.jogo.destroy',['0'])}} mt-0" class="form-group d-flex" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                        @foreach($jogos as $jogo)
                            <option value="{{$jogo->id}}">{{$jogo->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Remover</button>
                </form>
            </div>
            
            <!-- CRUD Categoria -->
            <div class="categoria_crud">
                <h3 class="text-center">Categoria</h3>
                <div>
                <!-- CRIAR Categoria -->
                    <a href="{{route('admin.categoria.create')}}" class="btn btn-outline-success active d-block">Criar Categoria</a>
                </div>
                <!--  EDITAR Categoria -->
                <form action="{{route('admin.categoria.edit',['0'])}}" class="form-group d-flex mb-0">
                    @csrf
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;" required>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-info" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Editar</button>
                </form>
                <!-- REMOVER Categoria -->
                <form action="{{route('admin.categoria.destroy',['0'])}} mt-0" class="form-group d-flex" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Remover</button>
                </form>
            </div>

            <!-- CRUD Produtos -->
            <div class="produto_crud">
                <h3 class="text-center">Produtos</h3>
                <div>
                <!-- CRIAR produto -->
                    <a href="{{route('admin.produto.create')}}" class="btn btn-outline-success active d-block">Criar Produto</a>
                </div>
                <!--  EDITAR produto -->
                <form action="{{route('admin.produto.edit',['0'])}}" class="form-group d-flex mb-0">
                    @csrf
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;" required>
                        @foreach($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-info" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Editar</button>
                </form>
                <!-- REMOVER produto -->
                <form action="{{route('admin.produto.destroy',['0'])}} mt-0" class="form-group d-flex" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                        @foreach($produtos as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Remover</button>
                </form>
            </div>

            <!-- CRUD Categoria -->
            <div class="categoria_crud">
                <h3 class="text-center">Categoria</h3>
                <div>
                <!-- CRIAR Categoria -->
                    <a href="{{route('admin.categoria_para_produto.create')}}" class="btn btn-outline-success active d-block">Criar Categoria</a>
                </div>
                <!--  EDITAR Categoria -->
                <form action="{{route('admin.categoria_para_produto.edit',['0'])}}" class="form-group d-flex mb-0">
                    @csrf
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;" required>
                        @foreach($categorias_para_produto as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-info" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Editar</button>
                </form>
                <!-- REMOVER Categoria -->
                <form action="{{route('admin.categoria_para_produto.destroy',['0'])}} mt-0" class="form-group d-flex" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <select name="id" id="" class="form-control "style="border-top-right-radius: 0;border-bottom-right-radius: 0;">
                        @foreach($categorias_para_produto as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">Remover</button>
                </form>
            </div>
        </div>
        
        <div class="col-md-9">
            <h3 class="text-center display-4">Pedidos Recebidos</h3>
            <hr>
            <div id="accordion">
                @forelse($orders as $key => $order)
                    <div class="card bg-dark">
                        <div class="card-header" id="headingOne{{$key}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-info" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                            Pedido nº: {{$order->referencia}}
                            </button>
                        </h5>
                        </div>
                    
                        <div id="collapseOne{{$key}}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne{{$key}}" data-parent="#accordion">
                        <div class="card-body">
                            <ul>
                                @php 
                                 $items =unserialize($order->items);
                                @endphp
                                @foreach($items as $item)
                                    <li class="d-flex">
                                        <span>idº </span>
                                        <span> {{$item['nome']}} | R${{$item['valor']}} | qnt: {{$item['quantidade']}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                
                    @empty
                    <div class="alert alert-warning">Nenhum pedido recebido</div>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection
