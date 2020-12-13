<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\User;
use App\Models\Administrador;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\TratarDados;


class JogoController extends Controller
{
    use TratarDados;
    protected $instancia;
    protected $foto_padrao = 'jogos_fotos/default.png';
    protected $foto_src = 'jogos_fotos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'oi';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jogo.create');
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
        $dados = $this->tratarDados($request,false);
        
        $jogo = Jogo::create($dados);

        $forum = $jogo->forum()->create(['slug'=>$jogo->slug,'nome'=>$jogo->nome,'frase'=>$jogo->descricao, 'foto'=>$jogo->foto]);
        flash('Jogo e seu respectivo Forum criados com sucesso')->success()->important();
        return redirect(route('admin.index'));
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
        return 'oi';
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
        $id = request()->all()['id'];
        $dados = Jogo::find($id);
        return view('jogo.edit',compact('dados'));

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
        $jogo = Jogo::find($id);
        $this->instancia = $jogo;
        $dados = $this->tratarDados($request,true);
        $jogo->update($dados);

        $forum = $jogo->forum->update(['slug'=>$jogo->slug,'nome'=>$jogo->nome,'frase'=>$jogo->descricao, 'foto'=>$jogo->foto]);
        flash('Jogo e seu respectivo Forum atualizados com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deleta o Jogo e seu respectivo Forum, assim como sua foto que esta armazenada
        $id = request()->all()['id'];
        $jogo = Jogo::find($id);

        Storage::disk('public')->delete($jogo->foto);
        $forum = $jogo->forum;
        $forum->delete();
        $jogo->delete();
        flash('Jogo e seu respectivo Forum apagados com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }
}
