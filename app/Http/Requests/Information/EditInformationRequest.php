<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class EditInformationRequest extends FormRequest
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
            'email' => 'required|email|unique:information,email,'.$this->id,
            'logo' => 'min:1|max:500|mimes:jpeg,png,svg|dimensions:min_width=50,min_height=50',
            'status' => 'required|numeric',
            'phone' => 'required|max:20',
            'address' => 'required|max:200',
            'textfooter' => 'required|max:100',
            'facebook' => 'required|max:50',
            'google' => 'required|max:50',
            'instagram' => 'required|max:50',
        ];
    }
}
