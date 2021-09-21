<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapsuleRequest extends FormRequest
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
            'from' => 'required|max:200',
            'to' => 'required|max:200',
            'email' => 'required|email',
            'remember_at' => 'required|date',
            'message' => 'required',
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
            'from.required' => 'O nome DE quem está enviando não foi informado',
            'from.max' => 'O nome DE não pode ser maior que 200 caracteres',
            'to.required' => 'O nome PARA quem está enviando não foi informado',
            'to.max' => 'O nome PARA não pode ser maior que 200 caracteres',
            'email.required' => 'O email para quem está enviando não foi informado',
            'email.email' => 'O email informado não é válido',
            'remember_at.required' => 'A data de abertura da cápsula não foi informada',
            'rementer_at.date' => 'A data de abertura da cápsula não é válida',
            'message.required' => 'A mensagem da cápsula não foi informada',
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
            'from' => 'de',
            'to' => 'para',
            'email' => 'email',
            'remember_at' => 'data',
            'message' => 'mensagem',
        ];
    }
}
