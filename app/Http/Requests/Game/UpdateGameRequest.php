<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateGameRequest extends FormRequest
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
            'day' => 'date',
            'start' => "date_format:H:i",
            'end' => "date_format:H:i",
            'home_team_scoreboard' => 'integer',
            'away_team_scoreboard' => 'integer',
            "winner" => 'string|nullable',
            'league' => 'required|string',
            'home_team' => 'string',
            'away_team' => "string",
        ];
    }

    public function messages()
    {
        return [
            'day.date' => 'O campo data deve ser uma data válida.',
            'start.time' => 'O campo horário de início deve ser um horário válido.',
            'start.after' => 'O horário de início deve ser posterior ao horário atual.',
            'end.time' => 'O campo horário de término deve ser um horário válido.',
            'end.after' => 'O horário de término deve ser após o horário de início.',
            'home_team_scoreboard.integer' => 'O placar da equipe da casa deve ser um número inteiro.',
            'away_team_scoreboard.integer' => 'O placar da equipe visitante deve ser um número inteiro.',
            'winner.string' => 'O vencedor deve ser uma string.',
            'home_team.string' => 'O campo equipe da casa deve ser uma string.',
            'away_team.string' => 'O campo equipe visitante deve ser uma string.',
            'league.required' => 'O campo liga é obrigatório.',
            'league.string' => 'O campo liga deve ser uma string.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
