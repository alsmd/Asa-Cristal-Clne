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
                    <label for=""class="d-flex justify-content-between">Nome no Cartão</label>
                    <input type="text" class="form-control" name="card_name">
                </div>
            </div>
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

            <div class="row last-row">
                <div class="form-group col-md-5">
                    <label for="">Código de Segurança</label>
                    <input type="number" class="form-control" name="card_cvv">
                </div>
            </div>
            <button class="btn btn-success btn-lg processCheckout">Efetuar Pagamento</button>
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
        //recupera o cartão utilizado com base nos 6 primeiros digitos inseridos pelo usuario
        let amountTransaction = '{{$total}}';
        let cardNumber = document.querySelector('input[name=card_number]');
        let spanBrand = document.querySelector('span.brand');
        let brandName;
        cardNumber.addEventListener('keyup',function(e){
            if(cardNumber.value.length >= 6){
                PagSeguroDirectPayment.getBrand({
                    cardBin:cardNumber.value.substr(0,6),
                    success: function(res){
                        let imgFlag = `https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png`;
                        spanBrand.innerHTML = `<img src=${imgFlag}>`;
                        brandName = res.brand.name;
                        if($('.opcoes-pagamentos').length == 0){
                            getInstallments(amountTransaction,res.brand.name);
                        }
                    },
                    error: function(res){
                       $('.opcoes-pagamentos').remove();

                    }
                });
            }else{
                brandName = '';
                spanBrand.innerHTML = '';
                $('.opcoes-pagamentos').remove();
            }
        });

        //recuperar o token do cartão
        let submitButton = $('button.processCheckout');
        submitButton.on('click',function(e){
            e.preventDefault();
            PagSeguroDirectPayment.createCardToken({
                cardNumber: $('input[name=card_number]').val(),
                brand:  brandName,
                cvv:  $('input[name=card_cvv]').val(),
                expirationMonth:  $('input[name=card_month]').val(),
                expirationYear:  $('input[name=card_year]').val(),
                success: function(res){
                    processPayment(res.card.token);
                },
                error: function(res){
                    console.log(res)
                }
            });
        });
        //enviar requisição para o pagamento
        function processPayment(token){
            let data = {
                card_token: token,
                hash: PagSeguroDirectPayment.getSenderHash(), //Ira nos retornar um hash que identifica o usuario para essa requisição de pagamento
                installment: $('.select_installments').val(),
                _token: '{{csrf_token()}}',
                card_name:$('input[name=card_name]').val()
            }
            $.ajax({
                type:'POST',
                url:'{{route("checkout.proccess")}}',
                data:data,
                dataType: 'json',
                success:function(res){
                    console.log(res);
                },
                error:function(res){
                    console.log(res);
                }
            });
        }
        //recupera as opções de parcelamentos com base em um valor e um cartao especifico
        function getInstallments(total,brand){
            PagSeguroDirectPayment.getInstallments({
                amount:total,
                brand:brand,
                maxInstallmentNoInterest:0,
                success: function(res){
                    let select = drawSelectInstallments(res.installments[brand]);
                    $('.last-row').append(select);
                },
                error: function(res){
                }
            });
        }

        //cria o select que iremos utilizar para mostrar as opções de parcelamentos
        function drawSelectInstallments(installments){
            let select = '<div class="form-group col-md-6 opcoes-pagamentos"><label>Opções de Parcelamento </label>';
            select += '<select class="form-control select_installments">';
            for(let l of installments){
                select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount} </option>`;
            }
            select += '</select></div>';
            return select;
        }
    </script>
@endsection

