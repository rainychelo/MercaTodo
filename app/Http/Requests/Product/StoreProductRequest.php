<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|string|max:120',
            'value' => 'required|integer|min:1',
            'image'=>'required|mimes:jpg,png,jpeg|max:250',
            'stock'=>'nullable|integer'
        ];
    }
}
