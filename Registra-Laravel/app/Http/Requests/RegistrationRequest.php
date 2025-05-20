<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|unique:users|regex:/^[a-zA-Z0-9_]{3,}$/',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits:10',
            'whatsapp' => 'required|numeric|digits_between:8,15',
            'address' => 'required|string|min:5',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])/',
            'user_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'user_name.regex' => __('validation.username_format'),
            'password.regex' => __('validation.password_format'),
        ];
    }
}