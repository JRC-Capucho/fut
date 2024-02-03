<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreGameRequest extends FormRequest
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
            'day' => 'required|date',
            'start' => "required|time",
            'end' => "required|time|after:start",
            'home_team_scoreboard' => 'integer',
            'away_team_scoreboard' => 'integer',
            "winner" => 'string',
            'home_team' => 'required|string',
            'away_team' => "required|string",
        ];
    }

    public function messages()
    {
        return [
            'day.required' => 'O campo data é obrigatório.',
            'day.date' => 'O campo data deve ser uma data válida.',
            'start.required' => 'O campo horário de início é obrigatório.',
            'start.time' => 'O campo horário de início deve ser um horário válido.',
            'start.after' => 'O horário de início deve ser posterior ao horário atual.',
            'end.required' => 'O campo horário de término é obrigatório.',
            'end.time' => 'O campo horário de término deve ser um horário válido.',
            'end.after' => 'O horário de término deve ser após o horário de início.',
            'home_team_scoreboard.integer' => 'O placar da equipe da casa deve ser um número inteiro.',
            'away_team_scoreboard.integer' => 'O placar da equipe visitante deve ser um número inteiro.',
            'winner.string' => 'O vencedor deve ser uma string.',
            'home_team.required' => 'O campo equipe da casa é obrigatório.',
            'home_team.string' => 'O campo equipe da casa deve ser uma string.',
            'away_team.required' => 'O campo equipe visitante é obrigatório.',
            'away_team.string' => 'O campo equipe visitante deve ser uma string.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
