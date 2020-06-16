<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoStoreRequest extends FormRequest
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
            'modelo' => 'required',
            'marca_id' => 'required',
            'valor' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'quilometragem' => 'required',
            'equipamentos' => 'exists:equipamentos,id',
            'transmissao' => 'required',
            'condicao' => 'required',
            'combustivel' => 'required',
            'ano' => 'required',
            'cor' => 'required',
            'imagemCapa' => 'max:20971520|mimes:jpg,jpeg,png',
            'images.*' => 'max:20971520|mimes:jpg,jpeg,png'
        ];
    }
}
