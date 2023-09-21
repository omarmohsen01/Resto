<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $category_id=$this->route('category');
        return [
            'name'=>"sometimes|required|string|min:3|max:255|unique:categories,name,$category_id",
            'status'=>"in:active,archived",
            'category_id'=>[
                'integer','exists:categories,id'
            ],
            'small'=>'integer',
            'medium'=>'integer',
            'large'=>'integer'
        ];
    }
}
