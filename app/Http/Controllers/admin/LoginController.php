<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
   public function login()
   {  
        //显示后台登录页面
        return view('admin.login');
   }

   public function dologin(Request $request)
   {
        //获取用户的数据
        $users = Users::where('uname', $request->uname)->first();
        //判断用户的登录权限
        if(!$users){
            return back()->with('error','登陆失败!');
        }
        if($users['qx']==0 || $users['qx']==1){
             return back()->with('error','普通用户不能登录后台');
        }
       
        //校验密码
        if(Hash::check($request->pwd, $users->pwd)){
            //写入session
            session(['adminUser'=>$users]);
            return redirect('/admin/user')->with('success','登陆成功');
        }else{
            return back()->with('error','登陆失败!');
        }

   }
   

}
