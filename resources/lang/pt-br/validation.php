<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Campo :attribute precisa ser aceito.',
    'active_url' => 'Campo :attribute não é uma URL válida.',
    'after' => 'Campo :attribute precisa ser uma data posterior a :date.',
    'after_or_equal' => 'Campo :attribute precisa ser uma data posterior ou igual a :date.',
    'alpha' => 'Campo :attribute só pode conter letras.',
    'alpha_dash' => 'Campo :attribute só pode conter letras, números, traços ou underscrores.',
    'alpha_num' => 'Campo :attribute só pode conter letras e números.',
    'array' => 'Campo :attribute precisa ser um array.',
    'before' => 'Campo :attribute precisa ser uma data anterior a :date.',
    'before_or_equal' => 'Campo :attribute precisa ser uma data anterior ou igual a  :date.',
    'between' => [
        'numeric' => 'Campo :attribute precisa estar entre :min e :max.',
        'file' => 'Campo :attribute precisa estar entre :min e :max kilobytes.',
        'string' => 'Campo :attribute precisa estar entre :min e :max characteres.',
        'array' => 'Campo :attribute precisa estar entre :min e :max items.',
    ],
    'boolean' => 'Campo :attribute field precisa ser verdadeiro ou falso.',
    'confirmed' => 'Campo :attribute não verificado.',
    'date' => 'Esta :attribute não é uma data válida.',
    'date_equals' => 'Campo :attribute precisa ser uma data igual a :date.',
    'date_format' => 'Campo :attribute não ter o formato :format.',
    'different' => 'Campo :attribute e :other precisam ser diferentes.',
    'digits' => 'Campo :attribute precisa ter :digits dígitos.',
    'digits_between' => 'Campo :attribute precisa estar entre :min e :max digitos.',
    'dimensions' => 'Campo :attribute não tem as dimensões corretas.',
    'distinct' => 'Campo :attribute tem um valor duplicado.',
    'email' => 'Campo :attribute precisa ser um email válido.',
    'ends_with' => 'Campo :attribute precisa terminar com un dos seguintes: :values',
    'exists' => 'O campo selecionado :attribute é inválido.',
    'file' => 'Campo :attribute precisa ser um arquivo.',
    'filled' => 'Campo :attribute precisa estar preenchido.',
    'gt' => [
        'numeric' => 'Campo :attribute precisa ser maior que :value.',
        'file' => 'Campo :attribute precisa ter mais de :value kilobytes.',
        'string' => 'Campo :attribute precisa ter mais que :value characters.',
        'array' => 'Campo :attribute precisa ter mais que :value items.',
    ],
    'gte' => [
        'numeric' => 'Campo :attribute precisa ser maior ou igual a :value.',
        'file' => 'Campo :attribute precisa ser maior ou igual a :value kilobytes.',
        'string' => 'Campo :attribute precisa ser maior ou igual a :value characters.',
        'array' => 'Campo :attribute precisa ser maior ou igual a :value items.',
    ],
    'image' => 'Campo :attribute precisa ser uma imagem.',
    'in' => 'O campo selecionado :attribute é inválido.',
    'in_array' => 'Campo :attribute não existe em :other.',
    'integer' => 'Campo :attribute precisa ser um número inteiro.',
    'ip' => 'Campo :attribute precisa ser um IP válido.',
    'ipv4' => 'Campo :attribute precisa ser u IPv4 válido.',
    'ipv6' => 'Campo :attribute precisa ser um IPv6 válido.',
    'json' => 'Campo :attribute precisa ser JSON válido.',
    'lt' => [
        'numeric' => 'Campo :attribute precisa ser menor que :value.',
        'file' => 'Campo :attribute precisa ter menos de :value kilobytes.',
        'string' => 'Campo :attribute precisa ter menos que :value caracteres.',
        'array' => 'Campo :attribute precisa ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => 'Campo :attribute precisa ser menor ou igual a :value.',
        'file' => 'Campo :attribute precisa ser menor ou igual a :value kilobytes.',
        'string' => 'Campo :attribute precisa ser menor ou igual a :value caracteres.',
        'array' => 'Campo :attribute precisa ser menor ou igual a :value itens.',
    ],
    'max' => [
        'numeric' => 'Campo :attribute precisa ser maior que :value.',
        'file' => 'Campo :attribute precisa ter no máximo :value kilobytes.',
        'string' => 'Campo :attribute precisa ter no máximo :value caracteres.',
        'array' => 'Campo :attribute precisa ter no máximo :value itens.',
    ],
    'mimes' => 'Campo :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => 'Campo :attribute precisa ser um arquivo dos tipos: :values.',
    'min' => [
        'numeric' => 'Campo :attribute não pode ser menor que :value.',
        'file' => 'Campo :attribute precisa ter menos de :value kilobytes.',
        'string' => 'Campo :attribute precisa ter menos que :value caracteres.',
        'array' => 'Campo :attribute precisa ter menos que :value itens.',
    ],
    'not_in' => 'O campo selecionado :attribute é inválido.',
    'not_regex' => 'Campo :attribute está com o formato inválido.',
    'numeric' => 'Campo :attribute precisa ser um número.',
    'password' => 'A senha está errada.',
    'present' => 'Campo :attribute field precisa ser atual.',
    'regex' => 'Campo :attribute está com o formato inválido.',
    'required' => 'Campo :attribute é obrigatório.',
    'required_if' => 'Campo :attribute é obrigatório quando :other é :value.',
    'required_unless' => 'Campo :attribute a obrigatório a menos que :other seja :values.',
    'required_with' => 'Campo :attribute é obrigatório quando :values são estes.',
    'required_with_all' => 'Campo :attribute é obrigatório quando :values são estes.',
    'required_without' => 'Campo :attribute é obrigatório quando :values não são estes.',
    'required_without_all' => 'Campo :attribute é obrigatório quando nenhum dos :values são estes.',
    'same' => 'Campo :attribute e :other precisam coincidir.',
    'size' => [
        'numeric' => 'Campo :attribute precisa ter o tamanho de :value.',
        'file' => 'Campo :attribute precisa ter o tamanho de :value kilobytes.',
        'string' => 'Campo :attribute precisa ter o tamanho de :value caracteres.',
        'array' => 'Campo :attribute precisa ter o tamanho de :value itens.',
    ],
    'starts_with' => 'Campo :attribute precisa começar com um dos seguintes: :values',
    'string' => 'Campo :attribute precisa ser um texto.',
    'timezone' => 'Campo :attribute precisa ser um horário válido.',
    'unique' => 'Campo :attribute já foi utilizado.',
    'uploaded' => 'Campo :attribute falhou o upload.',
    'url' => 'Campo :attribute precisa ser uma URL válida.',
    'uuid' => 'Campo :attribute precisa ser UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
