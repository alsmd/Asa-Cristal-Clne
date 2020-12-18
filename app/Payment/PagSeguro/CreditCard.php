<?php

namespace App\Payment\PagSeguro;

class CreditCard{
    private $items;
    private $user;
    private $card_info;
    private $referencia;

    public function __construct($items,$user,$card_info,$reference){
        $this->items = $items;
        $this->user = $user;
        $this->card_info = $card_info;
        $this->reference = $reference;
    }

    public function doPayment(){
        //instanciamos cartão de credito
        $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

        //nosso email como recebedores do pagamento
        $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));

        //referencia para identificar essa transação futuramente
        $creditCard->setReference($this->reference);

        //Moeda utilizada
        $creditCard->setCurrency("BRL");

        // Add an item for this payment request , itens recuperado do carrinho da session
        foreach($this->items as $item){
            $creditCard->addItems()->withParameters(
                $this->reference,
                $item['nome'],
                $item['quantidade'],
                $item['valor']
            );
        }
        // Set your customer information.
        // If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $email = env('PAGSEGURO_ENV') == 'sandbox' ? 'teste@sandbox.pagseguro.com.br' : $this->user->email;
        $creditCard->setSender()->setName($this->card_info['card_name']); //deve ser nome  e sobrenome
        $creditCard->setSender()->setEmail($email);

        $creditCard->setSender()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setSender()->setDocument()->withParameters(
            'CPF',
            '50107226073'
        );

        $creditCard->setSender()->setHash($this->card_info['hash']);//hash para identificar o usuario para essa requisição

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
        $creditCard->setToken($this->card_info['card_token']);

        // Set the installment quantity and value (could be obtained using the Installments
        // service, that have an example here in \public\getInstallments.php)
        list($quantity,$installmentAmount)= explode('|',$this->card_info['installment']);
        $installmentAmount = number_format($installmentAmount,2,'.','');
        $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);

        // Set the credit card holder information
        $creditCard->setHolder()->setBirthdate('01/10/1979');
        $creditCard->setHolder()->setName($this->card_info['card_name']); // Equals in Credit Card

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
        return $result;
    }
}