<?php

namespace App\Http\Requests\Admin\Landing;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'main_heading' => 'nullable',
            'main_text' => 'nullable',
            'soon_heading' => 'nullable',
            'cases_heading' => 'nullable',
            'cases_description' => 'nullable',
            'case1_heading' => 'nullable',
            'case2_heading' => 'nullable',
            'case1_text' => 'nullable',
            'case2_text' => 'nullable',
            'solution_heading' => 'nullable',
            'solution_text' => 'nullable',
            'process_heading' => 'nullable',
            'process_step1_heading' => 'nullable',
            'process_step2_heading' => 'nullable',
            'process_step3_heading' => 'nullable',
            'process_step1_text' => 'nullable',
            'process_step2_text' => 'nullable',
            'process_step3_text' => 'nullable',
            'footer_about' => 'nullable',
            'priority_heading' => 'nullable',
            'priority_text' => 'nullable',
            'main_img' => 'nullable',
            'case1_img' => 'nullable',
            'case2_img' => 'nullable',
            'solution_img' => 'nullable',
            'process_step1_img' => 'nullable',
            'process_step2_img' => 'nullable',
            'process_step3_img' => 'nullable',
            'about_heading' => 'nullable',
            'about_text' => 'nullable',
            'terms_and_conditions_heading' => 'nullable',
            'terms_and_conditions_text' => 'nullable',
            'privacy_policy_heading' => 'nullable',
            'privacy_policy_text' => 'nullable',
            'submit_heading' => 'nullable',
            'submit_text' => 'nullable',
            'submit_text_red' => 'nullable',
            'ads_text' => 'nullable',
            'ads_heading' => 'nullable'
        ];
    }
}
