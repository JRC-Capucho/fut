<?php

namespace App\Http\Requests\League;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreLeagueRequest extends FormRequest
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
            'name' => "required|string|min:3",
            'start' => "required|date",
            'end' => "required|date|after:start",
            'user' => "required|uuid"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'start.required' => 'O campo data de início é obrigatório.',
            'start.date' => 'O campo data de início deve ser uma data válida.',
            'end.required' => 'O campo data de término é obrigatório.',
            'end.date' => 'O campo data de término deve ser uma data válida.',
            'end.after' => 'O campo data de término deve ser posterior à data de início.',
            'user.required' => 'O campo usuário é obrigatório.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
