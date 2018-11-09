<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{
   public function zhuce()
   {

   		return view('home.zhuce.zhuce');
   }

   public function store(Request $request)
   {
   		$this->validate($request, [
   			'uname' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'pwd' => 'required|regex:/^[\w]{6,18}$/',
            'pwds' => 'required|same:pwds',

   		],[
   			'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'pwd.required' => '密码必填',
            'pwd.regex' => '密码格式错误',
            'pwds.required' => '确认密码必填',
            'pwds.same' => '两次密码不一致',
           

   		]);

   			$users = new Users;
            $users->uname = $request->input('uname','');

            $users->pwd = Hash::make($request->pwd);
  
             if($users ->save()){
                    return redirect('/')->with('success','添加成功');
                }else{
                    return back()->with('error','添加失败');
                }
           


   }
}
