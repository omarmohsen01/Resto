<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        $boo=$this->route('category');
        return [
            'user_id'=>[
                'sometimes','required','integer','exists:users,id'
            ],
            'table_id'=>[
                'sometimes','required','integer','exists:tables,id'
            ],
            'booking_date'=>'sometimes|required|date|after:now',
            'start_time' => 'sometimes|required',
            'end_time'=>'sometimes|required|after:now'
        ];
    }
}