<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'required|unique:products|string|unique:products,name'.
                $this->route('product')->id .'|max:120',
            'value'=>'required',
            'category_id'=>'required|interger|exists:App\Category.id',
            'provider_id'=>'required|interger|exists:App\Provider.id'
        ];
    }
}
