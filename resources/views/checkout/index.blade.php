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
                    <label for=""class="d-flex justify-content-between">Número do Cartão <span class="brand"></span></label>
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

@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script>
        const sessionId = "{{session()->get('pagseguro_session_code')}}";
        PagSeguroDirectPayment.setSessionId(sessionId);
    </script>


    <script>
        let cardNumber = document.querySelector('input[name=card_number]');
        let spanBrand = document.querySelector('span.brand');
        cardNumber.addEventListener('keyup',function(e){
            if(cardNumber.value.length >= 6){
                PagSeguroDirectPayment.getBrand({
                    cardBin:cardNumber.value.substr(0,6),
                    success: function(res){
                        let imgFlag = `https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png`;
                        spanBrand.innerHTML = `<img src=${imgFlag}>`;
                    },
                    error: function(res){
                        console.log(res);
                    }
                });
            }else{
                spanBrand.innerHTML = '';
            }
        });
    </script>
@endsection

