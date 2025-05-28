<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreClinicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required|string|min:3',
            'logradouro' => 'required|string',
            'numero' => 'required|string|max:5',
            'cnpj' => 'required|string',
        ];
    }

    public function messages(): array{
        return [
            'descricao.required' => 'O campo descricao é obrigatório',
            'descricao.string' => 'O campo descrição deve ser um texto',
            'numero.min' => 'O campo número deve conter no mínimo 3 caracteres',

            'logradouro.required' => 'O campo logradouro é obrigatório',
            'logradouro.string' => 'O campo logradouro deve ser um texto',

            'numero.required' => 'O campo número é obrigatório',
            'numero.string' => 'O campo número deve ser um texto',
            'numero.max' => 'O campo número deve conter no máximo 5 caracteres',

            'cnpj.required' => 'O campo CNPJ é obrigatório',
            'cnpj.string' => 'O campo CNPJ deve ser um texto',
        ];
    }
}
