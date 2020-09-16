<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'bail|required|alpha|min:6|max:10',
            'email' => 'bail|required|email|unique:users',
            'address' => 'bail|required|min:8',
            'phone' => 'bail|required|numeric',
            'name'=> 'required',
        ];
    }
}
