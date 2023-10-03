<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ["required", 'string', 'min:3', 'max:150'],
            'description' => ['nullable', 'string']
        ];
    }
    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание'
        ];
    }
}
