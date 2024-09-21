<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFavoriteRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'tagLine' => ['required', 'string', 'max:50'],
            'alcohol' => ['required', 'numeric', 'max:100'],
            'amargor' => ['required', 'numeric', 'max:100'],
            'food' => ['required', 'string', 'max:50'],
            'tips' => ['required', 'string', 'max:255'],
            'imgUrl' => ['string', 'max:255'],
            'dateBeer' => ['required', 'date'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
            'tagLine.required' => 'O campo tag line é obrigatório.',
            'alcohol.required' => 'O campo álcool é obrigatório.',
            'amargor.required' => 'O campo amargor é obrigatório.',
            'food.required' => 'O campo harmonização é obrigatório.',
            'tips.required' => 'O campo dicas é obrigatório.',
            'imgUrl.required' => 'O campo imagem é obrigatório.',
            'dateBeer.required' => 'O campo data é obrigatório.',
            'alcohol.numeric' => 'O campo álcool deve ser um número.',
            'amargor.numeric' => 'O campo amargor deve ser um número.',
            'dateBeer.date' => 'O campo data deve ser uma data válida.',
            'alcohol.max' => 'O campo álcool deve ter no máximo 2 caracteres',
            'amargor.max' => 'O campo amargor deve ter no máximo 2 caracteres',

        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $this->replace([
            'fav_name' => $this->name,
            'fav_description' => $this->description,
            'fav_tag_line' => $this->tagLine,
            'fav_alcohol' => $this->alcohol,
            'fav_amargor' => $this->amargor,
            'fav_food' => $this->food,
            'fav_tips' => $this->tips,
            'fav_img_url' => $this->imgUrl,
            'fav_date_beer' => $this->dateBeer,
        ]);
    }
}
