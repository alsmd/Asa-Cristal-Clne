@extends('layouts.layout2')
@section('content')


<main class="container bg-black text-light rounded mt-3">
    <h3>Criar Novo Produto</h3>   
    <form action="{{route('admin.produto.store')}}" method="post" enctype="multipart/form-data">
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
        <div class="form-valor">
            <div class="form-valor-header">
                Valor
            </div>
            <div class="form-group">
                <input name="valor" type="number"  class="form-control bg-black text-light @error('valor') is-invalid @enderror"  placeholder="Valor do produto"></input>
                @error('valor')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <p>Foto Para o Produto</p>
        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="customFile" name="foto">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <button class="btn btn-outline-warning">Postar</button>
    </form>

</main>
@endsection
