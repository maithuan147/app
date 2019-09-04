<?php

namespace App\Http\Requests\Product\Product;

use App\Rules\Restricted;
use Illuminate\Foundation\Http\FormRequest;

class InsertProductRequest extends FormRequest
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
            'name_product' => 'required|max:250|unique:products',
            'image' => 'image|min:1|max:500|mimes:jpeg,png,svg',
            'description' => 'required|max:250',
            'content' => ['required','max:5000',new Restricted],
            'status' => 'required|numeric|min:0|max:8',
            'slug'   => 'unique:products',
            'category_ids' => 'required|array',
        ];
    }
}
