<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatesStoreRequest extends FormRequest
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
     * 存放验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
        'cname' => 'required',
            //
        ];
    }

    public function messages()
    {
        return [
            'cname.required'=>'分类名称必填',
            // 'cname.regex'=>'分类名称格式不正确',  
        ];
    }
}
