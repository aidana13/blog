<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'author_name' => 'required',
            'blog_title' => 'required',
            'content' => 'required|min:500|max:5000'
        ];
    }
    public function attributes(){
        return [
            'author_name' => 'автор',
            'blog_title' => 'Название блога',
            'content' => 'содержание поста'
        ];
    }

    public function messages(){
        return [
            'author_name.required' => 'Поле автор является обязательным',
            'blog_title.required' => 'Название блога является обязательным',
            'content.required' => 'Введите содержание поста'
        ];
    }
}
