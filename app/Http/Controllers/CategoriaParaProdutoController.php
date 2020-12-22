<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaParaProduto;

class CategoriaParaProdutoController extends Controller
{

    protected $categoria_para_produto;


    public function __construct(CategoriaParaProduto $categoria_para_produto){
        $this->categoria_para_produto = $categoria_para_produto;
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
        return view('categoria_para_produto.create');
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
        $dados = $request->all();
        $categoria = $this->categoria_para_produto::create($dados);

        flash('Categoria Para Produto criado com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //recuperando produtos correspondentes a categoria
        $produtos = $this->categoria_para_produto->select(['produtos.nome','produtos.descricao','produtos.valor','produtos.foto','produtos.slug'])->where('categoria_para_produto.slug',$slug)->leftJoin('categoria_produto',function($join){
            $join->on('categoria_para_produto.id','=','categoria_produto.fk_id_categoria_para_produto');
        })->leftJoin('produtos',function($join){
            $join->on('categoria_produto.fk_id_produto','=','produtos.id');
        })->get();
        return view('categoria_para_produto.show',compact('produtos'));
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
        $dados = $this->categoria_para_produto::find($id);
        
        return view('categoria_para_produto.create',compact('dados'));

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
        $categoria_para_produto = $this->categoria_para_produto::find($id);
        $dados = $request->all();
        $categoria_para_produto->update($dados);
        flash('Categoria Para Produto atualizada com sucesso')->success()->important();
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
        $id = request()->all()['id'];
        $categoria_para_produto = $this->categoria_para_produto::find($id);

        $categoria_para_produto->delete();
        flash('Categoria Para Produto apagada com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }
}
