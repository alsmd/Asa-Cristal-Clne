<?php

namespace App\Http\Controllers\Ecomerce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\CategoriaParaProduto;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\TratarDados;

class ProdutoController extends Controller
{

    use TratarDados;
    protected $instancia;
    protected $foto_padrao = 'produtos_fotos/default.png';
    protected $foto_src = 'produtos_fotos';
    private $produto;
    private $comentario;
    private $categoria_para_produto;
    public function __construct(Produto $produto,CategoriaParaProduto $categoria_para_produto){
        $this->produto = $produto;
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
        $categorias_para_produtos = $this->categoria_para_produto->get();;
        return view('produto.create',compact('categorias_para_produtos'));
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
        $categorias_para_produtos = $request->get('categorias_para_produtos');
        unset($request->all()['categorias_para_produtos']);
        $dados = $this->tratarDados($request,false);
        
        $produto = $this->produto::create($dados);
        $produto->categorias()->sync($categorias_para_produtos);
        flash('Produto Criado com sucesso')->success()->important();
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
        //
        $produto = $this->produto::whereSlug($slug)->first();

        return view('produto.show',compact('produto'));
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
        $categorias_para_produtos = $this->categoria_para_produto->get();;
        $id = request()->all()['id'];
        $dados = $this->produto::find($id);
        $categorias_selecionadas = [];
        foreach($dados->categorias()->select('fk_id_categoria_para_produto')->get() as $categoria){
            $categorias_selecionadas[] = $categoria->fk_id_categoria_para_produto;
        }
        return view('produto.edit',compact('dados','categorias_para_produtos','categorias_selecionadas'));
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
        $categorias_para_produtos = $request->get('categorias_para_produtos');
        unset($request->all()['categorias_para_produtos']);
        $produto = $this->produto::find($id);
        $this->instancia = $produto;
        $dados = $this->tratarDados($request,true);
        $produto->update($dados);
        $produto->categorias()->sync($categorias_para_produtos);

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
        $produto = $this->produto::find($id);

        Storage::disk('public')->delete($produto->foto);
        $produto->delete();
        flash('Produto deletado com sucesso')->success()->important();
        return redirect(route('admin.index'));
    }
}
