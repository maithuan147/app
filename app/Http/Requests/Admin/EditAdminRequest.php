<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:admins,email,'.$this->id,
            'avatar' => 'image|min:1|max:500|mimes:jpeg,png,svg|dimensions:min_width=50,min_height=50',
            'status' => 'required|numeric',
            'phone' => 'max:11',
            'address' => 'max:50',
            'birthday' => 'date',
            'gender' => 'boolean',
            'facebook' => 'max:50',
            'skype' => 'max:20',
            'role_id' => 'required|numeric',
        ];
    }
}
