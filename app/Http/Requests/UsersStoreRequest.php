<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersStoreRequest extends Request
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
        return[
            'uname' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{1,15}$/',
            'pwd' => 'required|regex:/^[\w]{6,18}$/',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'required|email',

        ];
    }


    public function messages()
    {
        return [
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'pwd.required' => '密码必填',
            'pwd.regex' => '密码格式错误',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式不正确',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式不正确',



        ];
    }
}
