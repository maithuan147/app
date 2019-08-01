<?php

namespace App\Http\Requests\Page;

use App\Rules\Restricted;
use Illuminate\Foundation\Http\FormRequest;

class EditPageRequest extends FormRequest
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
            'title' => 'required|max:250|unique:pages,title,'.$this->id,
            'image' => 'image|min:1|max:500|mimes:jpeg,png,svg',
            'description' => 'required|max:250',
            'content' => 'required|max:5000',
            'status' => 'required|numeric|min:0|max:8',
            'slug'   => 'unique:pages,title'.$this->id,
            'user_id' => 'numeric',
            'tembplate' => 'required',
        ];
    }
}
