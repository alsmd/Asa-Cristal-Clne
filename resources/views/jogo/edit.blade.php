@extends('layouts.layout2')
@section('content')


<main class="container bg-black text-light rounded mt-3">
    <h3>Editar Novo Jogo</h3>   
    <form action="{{route('admin.jogo.update',[$dados->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control bg-black text-light @error('nome') is-invalid @enderror" id="nome" name="nome"  placeholder="Min 5 Caracteres" value="{{$dados->nome}}">
            @error('nome')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        
        <div class="form-descricao">
            <div class="form-descricao-header">
                descricao
            </div>
            <div class="form-group">
                <textarea name="descricao" id="" cols="15" rows="4" class="form-control bg-black text-light @error('descricao') is-invalid @enderror"  placeholder="Min 5 Caracteres"  >{{$dados->descricao}}</textarea>
                @error('descricao')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <p>Foto Para o Jogo</p>
        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="customFile" name="foto">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <button class="btn btn-outline-warning">Postar</button>
    </form>

</main>
@endsection
