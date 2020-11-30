<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class MensagemController extends Controller{
    protected $id_user_logado;
    protected $id_user_selecionado;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $user_selecionado = $request->all()['user_selecionado'];
        //usuario logado não pode entrar em chat com ele mesmo
        if($user_selecionado == auth()->user()->id){
            return false;
        }
        $this->id_user = auth()->user()->id;//user logado
        $this->id_user_selecionado = $user_selecionado ; //user selecionado
        $user_selecionado = User::find($user_selecionado);
        $chat = $this->getChat();
        $chat_id = $chat->id;
        $mensagens = $chat->mensagens()->orderBy('created_at','asc')->get();
        //marcando as mensagens como lidas
        foreach($mensagens->where('fk_id_user',$this->id_user_selecionado) as $mensagem){
            $mensagem->update(['status'=>'lido']);
        }

        return view('mensagem.index',compact('mensagens','user_selecionado','chat_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id_user = $request->all()['id_user'];
        $chat_id = $request->all()['chat_id'];
        $mensagem = $request->all()['mensagem'];
        $chat = Chat::find($chat_id);
        $mensagem = $chat->mensagens()->create(['fk_id_user' => $id_user,'mensagem' => $mensagem]);
        return $mensagem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
        *Retorna o chat do usuario logado com o usaurio selecionado, caso essa relação ainda não exista ela sera criada e retornada
    */
    public function getChat(){
        //verifica se existe relação entre o usuario logado e o usuario selecionado na tabela chat, caso não exista, uma relação sera criada
        $chat = Chat::where('fk_id_user1',$this->id_user)->get();
        $chat = $chat->where('fk_id_user2',$this->id_user_selecionado)->first();

        if($chat == null){
            $chat = Chat::where('fk_id_user2',$this->id_user)->get();
            $chat = $chat->where('fk_id_user1',$this->id_user_selecionado)->first();
        }
        if($chat == null){
            $chat = Chat::create(['fk_id_user1' => $this->id_user, 'fk_id_user2' => $this->id_user_selecionado]);
        }
        return $chat;
    }
}
