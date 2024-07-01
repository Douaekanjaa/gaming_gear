<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'productName' => 'required|min:3',
            'productDescription' => 'required|min:7',
            'productPrice' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'productName.required' => 'Product name is required',
            'productName.min' => 'too short enter more',
            'productDescription.required' => 'Product Description is required',
            'productDescription.min' => 'too short enter more',
            'productPrice.required' => 'Product price is required',
        ];
    }
}
