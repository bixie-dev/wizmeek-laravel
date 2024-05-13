<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class VideoUploadRequest extends FormRequest
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
            'file' => 'mimes:avi,mp4,mov|mimetypes:video/x-msvideo,video/mp4,video/quicktime'
        ];
    }
}
