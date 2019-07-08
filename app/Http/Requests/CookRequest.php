<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CookRequest extends FormRequest
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
            'name'   => 'required | max:255',
            'image' => 'file | image | mimes:jpeg,png',
            'description' => 'required',
            'price'   => 'required',
            'num'   => 'required',
            'start_time'   => 'required',
            'end_time'   => 'required',
        ];
    }
}
