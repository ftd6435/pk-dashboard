<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditPost extends FormRequest
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
            'title' => ['required', 'string', 'min:6'],
            'content' => ['required', 'string', 'min:10'],
            'image' => ['sometimes', 'required', 'image', 'mimes:jped,jpg,png', 'max:2048'],
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer']
        ];
    }
}
