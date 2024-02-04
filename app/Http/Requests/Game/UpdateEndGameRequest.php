<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEndGameRequest extends FormRequest
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
            'home_team_scoreboard' => 'required|integer',
            'away_team_scoreboard' => 'required|integer',
            'players' => 'array',
            'player_gols' => 'array',
        ];
    }

    public function messages()
    {
        return [
            'home_team_scoreboard.integer' => 'O placar da equipe da casa deve ser um número inteiro.',
            'away_team_scoreboard.integer' => 'O placar da equipe visitante deve ser um número inteiro.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
