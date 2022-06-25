<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //por default esse return vem como false, porem como nao estou utilizando o atorize trocar para true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

    //    dd($this->id);


        //regra de validacao para email do proprio usuario
        $id = $this->id ?? '';//nese caso a variavel $id esta recebendo o id, caso nao encontre vai receber a string vazia e não nulo


        //criando regra para validar e editar
        $rules = [
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id", //aqui esta sendo adicionado um execeçã para salva o email do proprio usuario, pois se  nao cria-se essa regra ia da erro de email ja existente
            ],
            'password' => [
                'required',
                'max:15',
                'min:6',
            ]
        ];

        if($this->method('PUT')){ //caso seja uma edicao, o usuario naõ é obrigado a preenche a senha
            $rules['password'] = [
                'nullable',
                'max:15',
                'min:6',
            ];
        }
        return $rules;

    }
}
