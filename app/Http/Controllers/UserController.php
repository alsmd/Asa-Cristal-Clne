<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);
        return view('usuario.show',compact('user'));
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
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        //
        $user = User::find(auth()->user()->id);
        $dados = $request->all();
        foreach($dados as $i => $dado){
            if($dado == null){
                unset($dados[$i]);
            }
        }
       
        if($request->hasFile('foto')){
            //apagar foto usada anteriormente pelo usuario
            $foto_antiga = $user->foto;
            $foto_padrao = 'users_fotos/default.png';
            if($foto_antiga != $foto_padrao){
                Storage::disk('public')->delete($foto_antiga);
            }
            $foto = $request->all('foto')['foto'];
            $foto_path = $foto->store('users_fotos','public');
            $dados['foto'] = $foto_path;
        }
        if($user->update($dados)){
            flash('Dados alterados com sucesso')->success()->important();
        }else{
            flash('Erro ao tentar alterar os Dados')->error()->important();

        }
        return redirect()->route('configuracao');
        

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
}
