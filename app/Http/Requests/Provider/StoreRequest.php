<?php

namespace App\Http\Requests\Provider;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:200|unique:providers',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|min:9|max:9|unique:providers'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es el correcto',
            'name.max' => 'Solo se permite 255 caracteres',

            'email.required' => 'Este campo es requerido',
            'email.string' => 'El valor no es el correcto',
            'email.max' => 'Solo se permite 200 caracteres',
            'email.unique' => 'ya se encuentra registrado',

            'address.required' => 'Este campo es requerido',
            'address.string' => 'El valor no es el correcto',
            'address.max' => 'Solo se permite 255 caracteres',

            'phone.required' => 'Este campo es requerido',
            'phone.string' => 'El valor no es el correcto',
            'phone.min' => 'Solo se permite 9 caracteres',
            'phone.max' => 'Solo se permite 9 caracteres',
            'phone.unique' => 'ya se encuentra registrado'
        ];
    }
}
