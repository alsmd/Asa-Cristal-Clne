@extends('layouts.layout2')
@section('head')
    <link rel="stylesheet" href="http://localhost:8080/src/css/produto.css">
@endsection
@section('content')
<main class="container bg-black text-light rounded mt-3 px-2">
    <div class="row m-0">
        <div class="col-md-6 p-0">
            <img src="{{asset('storage/'.$produto->foto)}}" alt="" class="w-100 img-produto">
        </div>
        <div class="col-md-5 area-descricao d-flex flex-column justify-content-between ml-auto">
            <div>
                <p>Novo | 10 vendidos</p>
                <h6 class="display-4">{{$produto->nome}}</h6>
                <h5 class="display-4">R$ {{number_format($produto->valor,'2',',','.')}} </h5>

                <p class="lead">{{$produto->descricao}}</p>
            </div>
            <div class="w-100">
                <hr class="border-warning ">
                <div class="form-group">
                    <label for="">Quantidade</label>
                    <input type="number" class="rounded" max="5" min="1" name="produto[quantidade]" value='1'>
                </div>
                <button class="btn btn-info d-block m-0 w-100 mt-1 py-2">Comprar Agora</button>
                <form action="{{route('carrinho.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="produto[nome]" value="{{$produto->nome}}">
                    <input type="hidden" name="produto[foto]" value="{{$produto->foto}}">
                    <input type="hidden" name="produto[valor]" value="{{$produto->valor}}">
                    <input type="hidden" name="produto[slug]" value="{{$produto->slug}}">
                    <div class="form-group">
                        <label for="">Quantidade</label>
                        <input type="number" class="rounded" max="5" min="1" name="produto[quantidade]" value='1'>
                    </div>
                    <button class="btn btn-outline-success d-block m-0 w-100 mt-1 py-2">Adicionar no Carrinho</button>

                </form>
            </div>
            
        </div>
    </div>
</main>
@endsection

<!-- 
<h1>{{$produto->nome}}</h1>



    <p>{{$produto->descricao}}</p> -->