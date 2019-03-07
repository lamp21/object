<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertStoreRequest extends FormRequest
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
        'pic' => 'required',
        'url' => 'required',
        // 'url' => 'required|regex:/^(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#])*[\w\-\@?^=%&/~\+#]?/$/',
        'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pic.required'=>'图片必要',
            'url.required'=>'网站必填',
            // 'url.regex'=>'网站格式不正确',
            'content.required'=>'网站内容必填',  
        ];
    }
}
