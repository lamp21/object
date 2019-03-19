<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
        'upass' => 'required|regex:/^[\w]{6,18}$/',
        'u_upass' => 'required|same:upass',
        'phone' => 'required|regex:/^1{1}[3-9][\d]{9}$/',
        // 'description' => 'required',
            //
        ];
    }


    public function messages()
    {
        return [
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名格式不正确',
            'upass.required'=>'密码必填',
            'upass.regex'=>'密码格式不正确',
            'u_upass.required'=>'确认密码必填',
            'u_upass.same'=>'两次密码不一致',
            'phone.required'=>'手机号必填',
            'phone.regex'=>'手机号格式不正确',
            // 'description.required'=>'个人介绍必填',  
        ];
    }
}
