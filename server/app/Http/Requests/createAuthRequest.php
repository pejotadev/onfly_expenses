<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'email|required',
            'password' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email',
            'password.required' => 'O campo senha é obrigatório'
        ];
    }
}
