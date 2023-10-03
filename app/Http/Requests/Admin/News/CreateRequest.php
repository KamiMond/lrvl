<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\Status;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
        $tableNameCategories = (new Category())->getTable();
        return [
            'title' => ['required', 'string', 'min: 3', 'max: 150'],
            'category_id' => ['required', 'integer', "exists:{$tableNameCategories},id"],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'img' => ['sometimes', 'image', 'mimes:jpeg,bmp,png, |max:1500'],
            'status' => ['required', new Enum(Status::class)],
            'description' => ['nullable', 'string']
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'author' => 'Автор',
            'status' => 'Статус',
            'description' => 'Описание'
        ];
    }
}
