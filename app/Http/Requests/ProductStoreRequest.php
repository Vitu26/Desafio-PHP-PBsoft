<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
