<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $admin_id=$this->route('admin');
        return [
            'name'=>"sometimes|required|string|max:255|unique:admins,name,$admin_id",
            'email'=>"sometimes|required|email|max:255|unique:admins,email,$admin_id",
            'password'=>"string",
            'super_admin'=>"required|exists:admins,super_admin",
            'roles'=>"required|array"
        ];
    }
}
