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


<div class="container-fluid bg-black text-light rounded mt-3 pb-1">
    
    <div class="row">
        @foreach($produtos as  $produto)
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
        @endforeach
    </div>
</div>
@endsection
