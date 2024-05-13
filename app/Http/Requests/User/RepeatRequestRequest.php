<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RepeatRequestRequest extends FormRequest
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
            'artist_name' => 'required|string',
            'song_name' => 'required|string',
            'user_id' => 'required|numeric',
            'channel_id' => 'required|numeric',
            'country' => 'nullable|string',
            'country_code' => 'nullable',
            'region_name' => 'nullable',
            'region' => 'nullable|string',
            'city' => 'nullable|string'
        ];
    }
}
