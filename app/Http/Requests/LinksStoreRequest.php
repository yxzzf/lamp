<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinksStoreRequest extends Request
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
        'name' => 'required|unique:links',
        'url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '链接名称不能为空',
            'name.unique' => '链接名称已存在',
            'url.required' => '链接地址不能为空',
        ];
    }
}
