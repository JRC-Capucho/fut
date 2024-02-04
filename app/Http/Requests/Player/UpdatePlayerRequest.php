<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:3',
            'shirt_number' => 'integer|min:1',
            'team' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'shirt_number.integer' => 'O campo número da camisa deve ser um número inteiro.',
            'shirt_number.min' => 'O campo número da camisa deve ser maior que 0.',
            'team.required' => 'O campo equipe é obrigatório.',
            'team.uuid' => 'O campo equipe deve ser um UUID válido.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
