<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id', // Validate category exists
            'vendor' => 'required|exists:vendors,id',     // Validate vendor exists
            'description' => 'required',
            'price' => 'required|numeric|min:0',         // Use numeric validation
            'quant' => 'required|integer|min:1',         // Ensure quantity is an integer and greater than 0
            'discount' => 'nullable|numeric|min:0|max:100', // Validate discount percentage
            'thumbImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Images array is optional
        ];
    }
}
