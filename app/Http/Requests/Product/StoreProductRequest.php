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
            'value' => 'required',
            'category_id' => 'required|interger|exists:App\Category.id',
            'image_id' => 'interger|interger|exists:App\image.id'
        ];
    }
}
