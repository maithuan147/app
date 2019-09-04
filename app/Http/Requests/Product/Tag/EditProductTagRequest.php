<?php

namespace App\Http\Requests\Product\Tag;

use Illuminate\Foundation\Http\FormRequest;

class EditProductTagRequest extends FormRequest
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
            'name' => 'required|unique:tag_products,name,'. $this->id,
            'slug' => 'unique:tag_products,slug,'. $this->id,
        ];
    }
}
