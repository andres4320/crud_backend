<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'gender_id' => 'required|int|max:255',
            'profession_id' => 'required|int|max:255',
            'municipality_id' => 'required|int|max:255',
        ];
    }
}
