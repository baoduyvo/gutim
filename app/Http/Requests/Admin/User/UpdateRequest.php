<?php

namespace App\Http\Requests\Admin\User;

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
            'email' => 'required|email|unique:users,email,' . $this->id,
            'full_name' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Must Email Addreess',
            'email.unique' => 'Email Is Exist. Please Choose Other Email',
            'full_name.required' => 'Please Enter Full Name',
            'phone.required' => 'Please Enter Phone',

        ];
    }
}
