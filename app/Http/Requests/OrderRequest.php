<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'product_name' => 'bail|required',
            'price' => 'bail|required|numeric',
            'qty' => 'bail|required|numeric|max:10',
            'ship_address' => 'bail|required|min:8',
            'note' => 'bail|required|min:8',
        ];
    }
}
