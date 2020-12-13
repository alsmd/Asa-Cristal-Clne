<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\TratarDados;

class ProdutoController extends Controller
{

    use TratarDados;
    protected $instancia;
    protected $foto_padrao = 'produtos_fotos/default.png';
    protected $foto_src = 'produtos_fotos';
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
        return view('produto.create');
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
        //
        $dados = $this->tratarDados($request,false);
        
        $produto = Produto::create($dados);

        flash('Produto Criado com sucesso')->success()->important();
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
        $dados = Produto::find($id);
        return view('produto.edit',compact('dados'));
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
        $produto = Produto::find($id);
        $this->instancia = $produto;
        $dados = $this->tratarDados($request,true);
        $produto->update($dados);
        flash('Produto Atualizado com Sucesso!')->success()->important();
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
        $produto = Produto::find($id);

        Storage::disk('public')->delete($produto->foto);
        $produto->delete();
        flash('Produto deletado com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }
}
