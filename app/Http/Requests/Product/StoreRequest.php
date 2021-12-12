<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|unique:products|string|max:255',
            'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'required',
            'category_id'=>'required|interger|exists:App\Category.id',
            'provider_id'=>'required|interger|exists:App\Provider.id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.unique' => 'Este nombre ya esta en uso',
            'name.string' => 'El valor no es el correcto',
            'name.max' => 'Solo se permite 50 caracteres',

            'image.required' => 'Este campo es requerido',
            'image.dimension' => 'Solo se permiten imagenes de 100x200 px',

            'sell_price.required' => 'Este campo es requerido',

            'category_id.required' => 'Este campo es requerido',
            'category_id.interger' => 'El valor tiene que ser un entero',
            'category_id.exist' => 'La categoria no existe',

            'provider_id.required' => 'Este campo es requerido',
            'provider_id.interger' => 'El valor tiene que ser un entero',
            'provider_id.exists' => 'El proveedor no existe'

        ];
    }
}
