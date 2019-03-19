<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
        'announcement_title' => 'required',
        'announcement_content' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'announcement_title.required'=>'标题必填',
            // 'announcement_title.regex'=>'',
            'announcement_content.required'=>'内容必填',
            // 'announcement_content.regex'=>'',

        ];
    }
}
