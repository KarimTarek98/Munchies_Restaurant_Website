<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ServiceValid extends FormRequest
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
            'service_name' => 'required|max:50',
            'service_icon' => 'required',
            'service_desc' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'service_name.required' => 'Please write service name',
            'service_name.max' => 'Service name should be max of 50 letter',
            'service_icon.required' => 'Please write service icon class',
            'service_desc.required' => 'Please write service description',
        ];
    }
}
