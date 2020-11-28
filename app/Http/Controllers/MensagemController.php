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
        $this->id_user = auth()->user()->id;//user logado
        $this->id_user_selecionado = $user_selecionado ; //user selecionado
        $user_selecionado = User::find($user_selecionado);
        $chat = $this->getChat();
        $mensagens = $chat->mensagens()->orderBy('created_at','asc')->get();
        return view('mensagem.index',compact('mensagens','user_selecionado'));
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
