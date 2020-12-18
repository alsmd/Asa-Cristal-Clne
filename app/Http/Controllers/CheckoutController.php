<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function index(){
        $isNotAuthenticate = !(auth()->check());
        if($isNotAuthenticate){
            return redirect()->route('home');
        }
        $this->makePagseguroSession();
        $total = 0;
        $itens = session()->get('carrinho');

        foreach($itens as $item){
            $total += $item['valor'] * $item['quantidade'];
        }
        return view('checkout.index',compact('total'));
    }

    public function proccess(Request $request){
        $dataPost = $request->all();
        $reference = 'XPTO';
        //instanciamos cartão de credito
        $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

        //nosso email como recebedores do pagamento
        $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));

        //referencia para identificar essa transação futuramente
        $creditCard->setReference($reference );

        //Moeda utilizada
        $creditCard->setCurrency("BRL");

        // Add an item for this payment request , itens recuperado do carrinho da session
        $cartItems = session()->get('carrinho');
        foreach($cartItems as $item){
            $creditCard->addItems()->withParameters(
                $reference,
                $item['nome'],
                $item['quantidade'],
                $item['valor']
            );
        }
        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $user = auth()->user();
        $email = env('PAGSEGURO_ENV') == 'sandbox' ? 'teste@sandbox.pagseguro.com.br' : $user->email;
        $creditCard->setSender()->setName($dataPost['card_name']); //deve ser nome  e sobrenome
        $creditCard->setSender()->setEmail($email);

        $creditCard->setSender()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setSender()->setDocument()->withParameters(
            'CPF',
            '50107226073'
        );

        $creditCard->setSender()->setHash($dataPost['hash']);//hash para identificar o usuario para essa requisição

        $creditCard->setSender()->setIp('127.0.0.0');

        // Set shipping information for this payment request
        $creditCard->setShipping()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

        //Set billing information for credit card
        $creditCard->setBilling()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

        // Token do cartão
        $creditCard->setToken($dataPost['card_token']);

        // Set the installment quantity and value (could be obtained using the Installments
        // service, that have an example here in \public\getInstallments.php)
        list($quantity,$installmentAmount)= explode('|',$dataPost['installment']);
        $installmentAmount = number_format($installmentAmount,2,'.','');
        $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);

        // Set the credit card holder information
        $creditCard->setHolder()->setBirthdate('01/10/1979');
        $creditCard->setHolder()->setName($dataPost['card_name']); // Equals in Credit Card

        $creditCard->setHolder()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setHolder()->setDocument()->withParameters(
            'CPF',
            '50107226073'
        );

        // Set the Payment Mode for this payment request
        $creditCard->setMode('DEFAULT');

        //Get the crendentials and register the credit card payment
        $result = $creditCard->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );
        dd($result);
    }


    private function makePagseguroSession(){
        $hasNotPagSeguroCode = !(session()->has('pagseguro_session_code'));
        //caso eu não possua a session code para saber qual que é a transação iremos ate a API do pagseguro e criar essa session e assim que ele retornar nos armazenamos na nossa session
        //iremos ter apenas uma session do pagseguro dentro da nossa aplicação
        if($hasNotPagSeguroCode){
            //ira receber o retorna com o codigo criado no baackend do pagseguro para a identificação da transação
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            session()->put('pagseguro_session_code',$sessionCode->getResult());

        }
        
    }
}
