@extends('layouts.layout2')
@section('content')


<main class="container bg-black text-light rounded mt-3">
    <h3>Criar Nova Categoria Para Produto</h3>   
    <form action="{{route('admin.categoria_para_produto.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control bg-black text-light @error('nome') is-invalid @enderror" id="nome" name="nome"  placeholder="Min 5 Caracteres">
            @error('nome')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        
        <div class="form-descricao">
            <div class="form-descricao-header">
                descricao
            </div>
            <div class="form-group">
                <textarea name="descricao" id="" cols="15" rows="4" class="form-control bg-black text-light @error('descricao') is-invalid @enderror"  placeholder="Min 5 Caracteres"></textarea>
                @error('descricao')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-outline-warning">Postar</button>
    </form>
</main>
@endsection
