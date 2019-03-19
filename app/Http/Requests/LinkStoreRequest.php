<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkStoreRequest extends FormRequest
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
            'link_name'=>'required',
            'link_adr'=>['required','regex:/^((https|http|ftp|rtsp|mms){0,1}(:\/\/){0,1})www\.(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/'],
            'link_email'=>'required',
            'link_des'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'link_name.required'=>'请填写网站名称',
            'link_adr.required'=>'请填写网址',
            'link_adr.regex'=>'网址格式不正确',
            'link_email.required'=>'请填写邮箱',
            'link_des.required'=>'请填写网站简介'
        ];
    }
}
