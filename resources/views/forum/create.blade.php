@extends('layouts.layout2')
@section('content')


<main class="container bg-black text-light rounded mt-3">
    <h3>Criar Novo Forum Para um Jogo</h3>   
    <form action="" method="post">
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
                Frase
            </div>
            <div class="form-group">
                <input name="frase" id=""  class="form-control bg-black text-light @error('frase') is-invalid @enderror"  placeholder="Min 5 Caracteres"></input>
                @error('frase')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="jogo">Jogo</label>
            <select class="form-control bg-black text-light @error('jogo') is-invalid @enderror" id="jogo" name="jogo"  placeholder="Min 5 Caracteres"> 
                <option value="">Asa de cristal</option>
                <option value="">DDTank</option>
            </select>
            @error('jogo')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        
        <p>Foto Para o Jogo</p>
        <div class="custom-file mb-4">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <button class="btn btn-outline-warning">Postar</button>
    </form>

</main>
@endsection
