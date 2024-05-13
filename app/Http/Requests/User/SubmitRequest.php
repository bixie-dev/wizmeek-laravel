<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends FormRequest
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
            'artist_name' => 'required|string|min:2|max:100',
            'song_title' => 'required|string|min:2|max:100',
            'genre' => 'required|string',
            'release_date' => 'required|string|min:3|max:10',
            'youtube_link' => 'nullable|url',
            'video_path' => 'nullable|string',
            'policy_agreement' => 'required|string',
            'description' => 'nullable|min:5|max:5000'
        ];
    }
}
