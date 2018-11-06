<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Setting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function setting()
    {
        //读取表中的数据
        $setting = setting::first();

        return view('admin.setting', compact('setting'),['title'=>'网站配置']);
    }
}
