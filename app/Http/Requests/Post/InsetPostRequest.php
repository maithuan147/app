<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class InsetPostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required|min:2|max:5000',
            'status' => 'required|numeric',
        ];
    }
}
