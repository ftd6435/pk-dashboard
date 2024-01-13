<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateService extends FormRequest
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
            'description' => ['required', 'string', 'min:8'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'user_id' => ['required', 'integer']
        ];
    }
}
