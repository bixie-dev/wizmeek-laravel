<?php

namespace App\Http\Requests\Admin\RepeatRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
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
            'performer' => 'required|string|max:255',
            'song_name' => 'required|string|max:255',
            'channel_id' => 'required',
        ];
    }
}
