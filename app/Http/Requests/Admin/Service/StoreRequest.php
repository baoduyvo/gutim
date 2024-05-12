<?php

namespace App\Http\Requests\Admin\Service;

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
            'price' => 'required',
            'description' => 'required',
            'benefit' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name Gym',
            'price.required' => 'Please Enter Price Gym',
            'description.required' => 'Please Enter Description Gym',
            'benefit.required' => 'Please Enter Benefit Gym',
            'image.required' => 'Please Enter Image Gym',
            'image.mimes' => 'Must jpg,png,jpeg',
        ];
    }
}
