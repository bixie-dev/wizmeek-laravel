<?php

namespace App\Http\Requests\Admin\Channels;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'string|max:30',
            'description_short' => 'string|max:200',
            'description_full' => 'string|max:500',
            'stream' => 'string',
            'logo' => 'image:jpg,jpeg,png',
            'poster' => 'image:jpg,jpeg,png'
        ];
    }
}
