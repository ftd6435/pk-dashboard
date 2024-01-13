<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateTeamMember extends FormRequest
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
            'position' => ['required', 'string', 'min:6'],
            'email' => ['required', 'email:unique'],
            'avatar' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2098'],
            'facebook' => ['sometimes', 'nullable', 'string', 'min:6'],
            'instagram' => ['sometimes', 'nullable', 'string', 'min:6'],
            'linkedin' => ['sometimes', 'nullable', 'string', 'min:6'],
            'description' => ['sometimes', 'nullable', 'string', 'min:10'],
            'user_id' => ['required', 'integer']
        ];
    }
}
