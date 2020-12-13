<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait TratarDados{
    /*
        1ºPrimeiro parametro deve ser uma instancia de  @Request 
        2ºSegundo parametro indica se os dados serão utilizados para realizar um update, caso sim ele ira apagar a foto anterior
        3ºAntes de utilizar o metodo a Classe devera conter os atributos 'instancia' para armazenar uma instancia referente ao dado que sera manipulado, 'foto_padrao' que ira armazenar o path para foto padrao para que ela não seja apagada
        e um atributo 'foto_src' que ira conter o nome da pasta onde a foto sera armazenada/removida

        PS: o atributo instancia só é necessario caso o update seja true
    */
    public function tratarDados(Request $request,$update){
        $dados = $request->all();
        if($request->hasFile('foto')){
            if($update){
                //apagar foto usada anteriormente pelo usuario
                $foto_antiga = $this->instancia->foto;
                $foto_padrao = $this->foto_padrao;
                if($foto_antiga != $foto_padrao){
                    Storage::disk('public')->delete($foto_antiga);
                }
            }
            $foto = $request->all('foto')['foto'];
            $foto_path = $foto->store($this->foto_src,'public');
            $dados['foto'] = $foto_path;
        }
        //retira os campos que foram colocados como nulos, ou seja não serão alterados
        foreach($dados as $i => $dado){
            if($dado == null){
                unset($dados[$i]);
            }
        }
        return $dados;
    }
}

?>