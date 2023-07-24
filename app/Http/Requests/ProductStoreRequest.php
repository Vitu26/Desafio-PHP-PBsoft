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
        if(request()->isMethod('post')) {
            return [
                'name' => 'required|string|max:258',
                'value' => 'required|numeric',
                'description' => 'required|string',
                'quanty' => 'required|numeric',
                'category' => 'required'
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'value' => 'required|numeric',
                'description' => 'required|string',
                'quanty' => 'required|numeric',
                'category' => 'required'
            ];
        }
    }

    /**
     * mensagens de erro
     */
    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'name.required' => 'Name is required!',
                'value.required' => 'Value is required!',
                'description.required' => 'Descritpion is required!',
                'quanty.required' => 'Quanty is required!',
                'category.required' => 'category is required!'
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'value.required' => 'Image is required!',
                'description.required' => 'Descritpion is required!',
                'quanty.required' => 'Descritpion is required!',
                'category.required' => 'Descritpion is required!'
            ];
        }
    }
}
