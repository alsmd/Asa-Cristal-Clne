<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Payment\PagSeguro\CreditCard;
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
        $itens = session()->get('carrinho');
        $user = auth()->user();
        $reference = 'XPTO';
        $creditCardPayment = new CreditCard($itens,$user,$dataPost,$reference);
        $result = $creditCardPayment->doPayment();
        
        $userOrder = [
            'referencia' => $reference,
            'pagseguro_code' => $result->getCode(),
            'pagseguro_status' => $result->getStatus(),
            'items' => serialize($itens)
        ];
        $user->orders()->create($userOrder);
        return response()->json([
            'data' => [
                'status' => true,
                'message' => 'Pedido criado com sucesso!'
            ]
        ]);
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
