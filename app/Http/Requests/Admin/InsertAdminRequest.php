<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InsertAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:250',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:3|max:20|confirmed',
            'password_confirmation'   => 'required|min:3|max:20',
            'status' => 'required|numeric',
            'role_id' => 'required|numeric',
        ];
    }
}
