<?php

namespace App\Http\Requests\Admin\Gym;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'phone' => 'required',
            'address' => 'required',
            'services' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'phone.required' => 'Please Enter Phone',
            'address.required' => 'Please Enter Address',
            'services.required' => 'Please Enter Services',
        ];
    }
}
