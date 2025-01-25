<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class quizRequest extends FormRequest
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
            'title'=> 'required|min:3|max:30',
            'description'=> 'required|min:3|max:30',
            'number_of_questions'=> 'required',
            'passing_score'=> 'required',
            'total_marks'=> 'required',
        ];
    }
}
