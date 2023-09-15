<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
            ],
            'short_descripton' => [
                'required',
                'string'
            ],
            'galery_images' => [
                'nullable',
                'array'
            ],
            'galery_images.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,gif',
                'max:2048'
            ],
            'stock' => [
                'required',
                'numeric',
                'min:0'
            ],
            'sku'=>[
                'required',
                'string',
                'unique:products'
            ],
            'price'=>[
                'required',
                'numeric',
                'min:0'
            ]

        ];
        return $rules;
    }
}
