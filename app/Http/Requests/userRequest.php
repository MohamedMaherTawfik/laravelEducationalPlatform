<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class userRequest extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'phone'=> 'required|string',
            'educational_stage'=> 'required|string',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->letters()],
        ];
    }
}
