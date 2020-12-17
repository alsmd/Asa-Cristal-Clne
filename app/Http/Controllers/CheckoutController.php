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
        return view('checkout.index');
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
