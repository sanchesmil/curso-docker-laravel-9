<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
        // Obtem o ID do usuário se estiver editando ele
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|max:255|min:3',
            // A regra no campo 'email' permite alterar os demais dados do user mantendo o mesmo email. 
            // Caso contrario o sistema lançaria um erro de email já existente pq entenderia que estaria criando um novo user 
            'email' => ['required','email',"unique:users,email,{$id},id"], 
            'password' => ['required','min:6','max:15']
        ];

        // Se for edição, permite que a senha seja nula
        if($this->method('PUT')){
            $rules['password'] = ['nullable','min:6','max:15'];
        }

        return $rules;
    }
}
