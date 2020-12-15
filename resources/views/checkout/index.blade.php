@extends('layouts.layout2')
@section('head')
@endsection
@section('content')
<main class="container bg-black text-light rounded mt-3 px-2">
    <div class="col-md-6">
        <h2>Dados para o Pagamento</h2>
        <hr class="border-light">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Número do Cartão</label>
                    <input type="text" class="form-control" name="card_number">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Mês de Expiração</label>
                    <input type="number" class="form-control" name="card_month">
                </div>
                <div class="form-group col-md-5">
                    <label for="">Ano de Expiração</label>
                    <input type="number" class="form-control" name="card_year">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Código de Segurança</label>
                    <input type="number" class="form-control" name="card_cvv">
                </div>
            </div>
            <button class="btn btn-success btn-lg">Efetuar Pagamento</button>
        </form>
    </div>
</main>
@endsection

