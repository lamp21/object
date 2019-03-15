<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordphotoUpdateRequest extends FormRequest
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
            'pic_title'=>'required',
            'pic'=>'required',
            'pic_form'=>'required',
            'pic_time'=>'required',
            'pic_content'=>'required',
            'pic_status'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'pic_title.required'=>'请填写标题',
            'pic.required'=>'请选择封面图',
            'pic.required'=>'请填写来源',
            'pic_time.required'=>'请填写发表时间',
            'pic_content.required'=>'请填写正文',
            'pic_status.required'=>'请选择是否展示',
        ];
    }
}