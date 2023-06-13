<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

        $id = $this->segment(4);
       
        return [
            'name' => "required|min:3|max:100|unique:stores,name,{$id},uuid_store",
            'phone' => "required|min:3|max:16",
            'mobile_phone'  => "required|min:3|max:16",
            'description' => "nullable|max:1000",
            'logo' => "nullable|file|mimes:png.jpg,jpeg"
        ];
    }

    public function messages(){
        return [ 
            'unqiue' => "ja existir empresa com esse Nome Tente outro",
            'required' => 'campo obrigatorio',
            'min' => 'Campo Preciso',
            'max' => 'Parece que você passo do limite de caracters',
            'file' => 'essa extensão não é permitida apenas JPG.PNG,JPEG'
        ];
    }
}
