<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $productId = $this->route('category')->id?? '';
        return [
            'title'=>['required', 'min:3', 'max:15', Rule::unique('products', 'title')->ignore($productId)],
            'price'=>['required', 'min:1', 'max:8', Rule::unique('products', 'price')->ignore($productId)],
            'description'=>['required', 'min:8', 'max:150'],
            'image'=>['required']
        ];
    }
}
