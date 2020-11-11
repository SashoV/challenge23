<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends FormRequest
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
            'team1_id' => 'required',
            'team2_id' => 'required',
            'team1_score' => 'nullable|numeric',
            'team2_score' => 'nullable|numeric',
            'date' => 'required|date',
            'is_finished' => 'required'
        ];
    }
}
