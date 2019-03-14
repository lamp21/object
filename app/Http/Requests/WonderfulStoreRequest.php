<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WonderfulStoreRequest extends FormRequest
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
            'title'=>'required',
            'wd_img'=>'required',
            'wd_form'=>'required',
            'wd_time'=>'required',
            'cate_uid'=>'required',
            'connect'=>'required',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'请填写标题',
            'wd_img.required'=>'请选择封面图',
            'wd_form.required'=>'请填写来源',
            'wd_time.required'=>'请填写发表时间',
            'cate_uid.required'=>'请填选择分类',
            'connect.required'=>'请填写正文',
            'status.required'=>'请选择是否展示',
        ];
    }
}
