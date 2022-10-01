<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class ValidPass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'new_pass' => 'required',
            'confirm_pass' => 'required|same:new_pass',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Please insert current password',
            'new_pass.required' => 'Please insert new password',
            'confirm_pass.required' => 'Please insert new password again',
            'confirm_pass.same' => 'New Password doesn\'t match',
        ];
    }
}
