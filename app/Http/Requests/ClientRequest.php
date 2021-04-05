<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'board' => "bail|required|min:7|max:10|unique:clients,board,$this->client",
            'name' => 'bail|required|min:3|max:70',
            'celular' => 'bail|required|min:3|max:11',
            //'cpf' => "bail|digits:11|"
            'type_vehicle' =>'bail',
        ];
    }
}
