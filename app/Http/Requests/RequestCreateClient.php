<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateClient extends FormRequest
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
            'fullName' => ['required', 'string', 'min:6'],
            'address' => ['required', 'string', 'min:6'],
            'profession' => ['required', 'string', 'min:6'],
            'email' => ['required', 'email:unique'],
            'image' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2098'],
            'website' => ['sometimes', 'nullable', 'string', 'min:6'],
            'user_id' => ['required', 'integer']
        ];
    }
}
