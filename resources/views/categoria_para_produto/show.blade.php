@extends('layouts.layout2')
@section('head')
    <style>
        .produto .card-body img{
            height:350px;
        }
        @media(max-width:500px){
            .produto .card-body img{
                height: 350px;
            }
        }
    </style>
@endsection
@section('content')


<main class="container-fluid bg-black text-light rounded mt-3 pb-3">
    <h1 class="text-center display-3 py-2 text-warning">{{$categoria->nome}}</h1>
    <div class="row justify-content-center">
        @forelse($produtos as  $produto)
        <div class="col-md-4 mt-2 col-sm-6">
            <div class="card bg-dark produto">
                <div class="card-header">
                    <a href="{{route('produto',[$produto->slug])}}" class="text-light"><h3 class='text-center'>{{$produto->nome}}</h3></a> 
                </div>
                <div class="card-body d-flex justify-content-center">
                    <a href="{{route('produto',[$produto->slug])}}"><img src="{{asset('storage/'.$produto->foto)}}" alt="" class="img-fluid rounded"></a>
                </div>
                <div class="card-footer">
                    <h3>R${{$produto->valor}}</h3>
                </div>
            </div>
        </div>
        @empty
            <h3 class="display-4 py-4 text-center alert alert-info">Nenhum Produto Encontrado Para Essa Categoria.</h3>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{$produtos->links()}}
    </div>
</main>
@endsection
