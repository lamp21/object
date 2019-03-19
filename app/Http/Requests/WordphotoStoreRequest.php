<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordphotoStoreRequest extends FormRequest
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
            'pic_content'=>'required',
            'pic_status'=>'required'
        ];
    }
     public function messages()
    {
        return [
            'pic_title.required'=>'请填写标题',
            'pic.required'=>'请选择封面图',
            'pic_form.required'=>'请填写来源',
            'pic_content.required'=>'请填写正文',
            'pic_status.required'=>'请选择是否展示',
        ];
    }
}
