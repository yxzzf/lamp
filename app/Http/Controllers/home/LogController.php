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
      //显示注册页面
   		return view('home.zhuce.zhuce');
   }

   public function store(Request $request)
   {

   		$this->validate($request, [
   			'uname' => 'required|unique:users|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9-_]+$/u',//用户的正则
            'pwd' => 'required|regex:/^[\w]{6,18}$/',//密码的正则
            'pwds' => 'required|same:pwd',

   		],[
          //格式错误提示
   			'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'pwd.required' => '密码必填',
            'pwd.regex' => '密码格式错误',
            'pwds.required' => '确认密码必填',
            'pwds.same' => '两次密码不一致',
           

   		]);
          //获取用户的姓名 密码
   			  $users = new Users;
            $users->uname = $request->input('uname','');

            $users->pwd = Hash::make($request->input('pwd'));
  
             if($users ->save()){
                   return redirect('/home/denglu')->with('success','注册成功');
                }else{
                    return back()->with('error','注册失败');
                }
   }

   public function denglu()
   {
    //显示用户登录页面
     return view('home.denglu.denglu');
   }


   public function dlg(Request $request)
   {
        //判断密码是否为空
        if($request->pwd == null)
            {
                 return back()->with('error','登陆失败!');
              
            }
        //获取用户的数据  
       $users = Users::where('uname', $request->uname)->first();
      
        if(!$users){
            return back()->with('error','登陆失败!');
        }
        

        //校验密码
        if(Hash::check($request->pwd, $users->pwd)){
            //写入session
            session(['Users' => $users]);
            session(['uname'=>$users['uname']]);
            session(['id'=>$users['id']]);
             return redirect('/')->with('success','登陆成功');
           
        }else{
            return back()->with('error','登陆失败!');

      }  

     }

     //退出
    public function loginout()
    {
        //退出登录
        session()->flush();
        return redirect('/');
    }





}
