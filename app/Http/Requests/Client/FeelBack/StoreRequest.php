<?php

namespace App\Http\Requests\Client\FeelBack;

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
            'email' => 'required|email|unique:enquiry,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Must Email Addreess',
            'email.unique' => 'Email Is Exist. Please Choose Other Email',
            'first_name.required' => 'Please Enter First Name',
            'last_name.required' => 'Please Enter Last Name',
            'phone.required' => 'Please Enter Full Name',
            'description.required' => 'Please Enter Message'
        ];
    }
}
