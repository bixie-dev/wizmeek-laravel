<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewChannel extends FormRequest
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
            'name' => 'required|string',
            'desc_short' => 'required|string|max:80',
            'desc_full' => 'required|string',
            'logo' => 'image|mime:jpg,gif,png,jpeg'
        ];
    }
}
