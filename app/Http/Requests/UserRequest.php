<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'nullable|min:2',
            'sobrenome' =>'nullable|min:2',
            'linkedin'=>'nullable|url',
            'foto'=>'nullable|image',
            'biografia'=>'nullable|min:5'
        ];
    }

    public function messages(){
        return [
            'image' =>'Arquivo precisa ser uma imagem valida!'
        ];
    }
}
