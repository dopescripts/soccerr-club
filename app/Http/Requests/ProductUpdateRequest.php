<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category' => 'required|exists:categories,id',
            'vendor' => 'required|exists:vendors,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'quant' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'thumbImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
