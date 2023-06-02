<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'name' => "required|min:2|max:100|unique:categories,name,{$id},id"
        ];
    }

    public function messages(){
        return [ 
            'required' => 'Campo Obrigatario',
            'min'=> 'No Mimino 2 caracters',
            'max'=> 'No Max 100 caracters',
            'unique'=> 'Humm.., parace que ja existir categoria com essa nome tente outro ',
        ];
    }
}
