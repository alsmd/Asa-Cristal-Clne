<?php

namespace App\Http\Controllers\Ecomerce;

use Illuminate\Http\Request;
use  App\Payment\PagSeguro\CreditCard;
use App\Http\Controllers\Controller;
use App\Models\Administrador;
class CheckoutController extends Controller
{
    private $admin;
    public function __construct(Administrador $admin){
        $this->admin = $admin;
    }
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
        try{
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
            //Notificar Admin sobre o novo pedido
            $admin = $this->admin->first();
            $admin->notifyAboutStore();
            session()->forget('carrinho');
            session()->forget('pagseguro_session_code');
            return response()->json([
                'data' => [
                    'status' => true,
                    'message' => 'Pedido criado com sucesso!',
                    'order' => $reference

                ]
            ]);
        }catch(\Exception $e){
            $message = env('APP_DEBUG')? $e->getMessage(): 'Erro ao processar pedido';
            return response()->json([
                'data' => [
                    'status' => false,
                    'message' => $message,
                    'order' => $reference
                ]
                ],401);
        }
    }

    public function thanks(){
        return view('checkout.thanks');
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
