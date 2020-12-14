<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Administrador;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\TratarDados;

class CategoriaController extends Controller
{
    use TratarDados;
    protected $instancia;
    protected $foto_padrao = 'categoria_fotos/default.png';
    protected $foto_src = 'categoria_fotos';
    protected $categoria;

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }
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
        return view('categoria.create');
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
        $categoria = $this->categoria::create($dados);

        flash('Categoria criado com sucesso')->success()->important();
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
        $dados = $this->categoria::find($id);
        return view('categoria.edit',compact('dados'));
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
        $categoria = $this->categoria::find($id);
        $this->instancia = $categoria;
        $dados = $this->tratarDados($request,true);
        $categoria->update($dados);
        flash('Categoria atualizada com sucesso')->success()->important();
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
        //
        //Deleta o Jogo e seu respectivo Forum, assim como sua foto que esta armazenada
        $id = request()->all()['id'];
        $categoria = $this->categoria::find($id);

        Storage::disk('public')->delete($categoria->foto);
        $categoria->delete();
        flash('Categoria apagada com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }
}
