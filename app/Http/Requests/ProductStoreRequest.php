<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Arquivo responsável por definir as regras de validação para os dados enviados em uma requisição de criação ou atualização.
 * Garante que os campos obrigatório estejam presentes e que os dados estejam no formato correto antes que permitir que q requsição seja processada pelo controlador
 */

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Determina se o usuário está autorizado a fazer a requisição
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     * define as regras de validação para os campos enviados na requisição
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:258',
            'value' => 'required|numeric',
            'description' => 'required|string',
            'quanty' => 'required|numeric',
            'category' => 'required'
        ];
    }

    /**
     * Mensagens de erro personalizadas para as regras de validação.
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'value.required' => 'Value is required!',
            'description.required' => 'Description is required!',
            'quanty.required' => 'Quantity is required!',
            'category.required' => 'Category is required!'
        ];
    }
}

