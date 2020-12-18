@extends('layouts.layout2')
@section('head')
@endsection
@section('content')
<main class="container bg-black text-light rounded mt-3 px-2">
    <h2 class="alert alert-success">
        Muito obrigado por sua compra!
    </h2>
    <h3>
        Seu pedido foi processado, código do pedido: {{request()->get('order')}}

    </h3>
</main>
@endsection


