<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255',
            'dateOfBirth' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'O campo nome é obrigatório.',
            'name.string'          => 'O campo nome deve ser uma string.',
            'name.max'             => 'O campo nome deve ter no máximo 255 caracteres.',
            'email.required'       => 'O campo email é obrigatório.',
            'email.string'         => 'O campo email deve ser uma string.',
            'email.email'          => 'O campo email deve ser um email válido.',
            'email.max'            => 'O campo email deve ter no máximo 255 caracteres.',
            'dateOfBirth.required' => 'O campo data de nascimento é obrigatório.',
            'dateOfBirth.date'     => 'O campo data de nascimento deve ser uma data válida.',
        ];
    }
}
