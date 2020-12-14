@extends('layouts.layout2')
@section('head')
@endsection
@section('content')
<main class="container bg-black text-light rounded mt-3 px-2">
    <div class="row m-0">
        <div class="col-md-8">

            <div class="row m-0">
                 <?php $valorTotal = 0;?>
                @if(count(session()->get('carrinho')))
                    @foreach($produtos as $produto)
                    <div class="col-lg-6 col-md-12 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header bg-dark">
                                <p class="card-text text-center">{{$produto['nome']}}</p>
                            </div>
                            <a href="{{route('produto',[$produto['slug']])}}" target="_blank" rel="noopener noreferrer">
                                <img class="card-img-top" src="{{asset('storage/'.$produto['foto'])}}" alt="Card image cap">
                            </a>

                            <div class="card-footer bg-dark d-flex justify-content-between">
                                <span>R$ {{$produto['valor']}}</span>
                                <span >qnt: {{$produto['quantidade']}}</span>
                                <form action="{{route('carrinho.remove',[$produto['slug']])}}" method="post">
                                    @csrf
                                    <button class=" btn btn-warning">Retirar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $valorTotal += $produto['valor'] * $produto['quantidade'];?>
                    @endforeach

                    @else
                    <div class="col-12">
                        <div class="alert alert-warning">Carrinho Vazio</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <p class="lead">Total:</p>
            <h3 class="display-4">R$ {{number_format($valorTotal,'2',',','.')}}</h3>
            <button class="btn btn-outline-danger btn-large p-3 mt-2">Finalizar Compra</button>
            <a href="{{route('carrinho.cancelar')}}" class="btn btn-info btn-large p-3 mt-2">Cancelar Compra</a>
        </div>
    </div>
</main>
@endsection

