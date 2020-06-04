<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropouseTypeRequest extends FormRequest
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
            'propouse'  => 'required',
            'name'      => 'required|string|max:150',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required'     => 'A descrição não foi informada',
            'propouse.required' => 'A letra do propósito não foi informado',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'      => 'descrição',
            'propouse'  => 'propósito',
        ];
    }
}
