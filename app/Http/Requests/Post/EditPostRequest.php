<?php

namespace App\Http\Requests\Post;

use App\Rules\Restricted;
use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title' => 'required|max:250|unique:posts,title,'. $this->id,
            'thumbnail' => 'image|min:1|max:500|mimes:jpeg,png',
            'description' => 'required|max:250',
            'content' => ['required','max:5000',new Restricted],
            'status' => 'required|numeric|min:0|max:8',
            'slug'   => 'unique:posts,slug,'. $this->id,
            'category_ids' => 'required|array',
        ];
    }
}
