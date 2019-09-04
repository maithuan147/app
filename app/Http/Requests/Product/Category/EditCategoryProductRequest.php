<?php

namespace App\Http\Requests\Product\Category;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryProductRequest extends FormRequest
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
            'name' => 'required|max:250|unique:category_products,name,'.$this->id,
            'description' => 'max:250',
            'status' => 'required|numeric|min:0|max:8',
            'slug'   => 'unique:category_products,slug,'.$this->id,
        ];
    }
}
