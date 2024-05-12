<?php

namespace App\Http\Requests\Admin\MemberShip;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'price.required' => 'Please Enter Price',
            'price.numeric' => 'Please Enter Price Number',
            'description.required' => 'Please Enter Description'
        ];
    }
}
