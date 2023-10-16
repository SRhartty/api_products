<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagemProductRequest extends FormRequest
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
        $rules = [
            'galery_images' => [
                'nullable',
                'array'
            ],
            'galery_images.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,gif',
                'max:2048'
            ]
        ];
        return $rules;
    }
}
