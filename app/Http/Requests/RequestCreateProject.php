<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateProject extends FormRequest
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
            'title' => ['required', 'string', 'min:5'],
            'details' => ['required', 'string', 'min:10'],
            'status' => ['required'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'testimonial' => ['sometimes', 'nullable', 'string', 'min:10'],
            'client_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ];
    }
}
