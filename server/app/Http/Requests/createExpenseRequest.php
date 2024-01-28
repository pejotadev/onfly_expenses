<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()){
            return true;
        } else {
            return false;
       }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string',
            'date' => 'required|date|before_or_equal:today',
            'value' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:191',
            'type' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'value.required' => 'O campo valor é obrigatório',
            'value.numeric' => 'O campo valor deve ser numérico',
            'description.required' => 'O campo descrição é obrigatório',
            'description.string' => 'O campo descrição deve ser uma string',
            'type.required' => 'O campo tipo é obrigatório',
            'type.string' => 'O campo tipo deve ser uma string',
            'date.required' => 'O campo data é obrigatório',
            'date.date' => 'O campo data deve ser uma data',
            'date.before_or_equal' => 'O campo data deve ser uma data anterior ou igual a hoje'
        ];
    }
}
