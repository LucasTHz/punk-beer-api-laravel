<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'passwordConfirmation' => 'required|string|same:password',
            'documentId' => 'required|string|max:14|unique:users',
            'dateOfBirth' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'same' => 'Os campos :attribute e :other devem ser iguais.',
            'unique' => 'O campo :attribute já está em uso.',
            'date' => 'O campo :attribute deve ser uma data válida.',

        ];
    }

    public function failedValidation(ValidationValidator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Dados fornecidos são inválidos.',
            'errors' => $validator->errors(),
        ], 422));
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'document_id' => $this->documentId,
            'date_of_birth' => $this->dateOfBirth
        ]);
    }
}
