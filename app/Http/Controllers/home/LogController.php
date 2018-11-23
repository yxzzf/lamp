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

            $users->pwd = Hash::make($request->input('pwd'));
  
             if($users ->save()){
                    echo  "<script>alert('注册成功');location.href='/home/denglu'</script>";
                }else{
                    return back()->with('error','注册失败');
                }
   }

   public function denglu()
   {
     return view('home.denglu.denglu');
   }


   public function dlg(Request $request)
   {

        if($request->pwd == null)
            {
                 return back()->with('error','登陆失败!');
              
            }
        //获取用户的数据
       $users = Users::where('uname', $request->uname)->first();
      
        if(!$users){
            // return back()->with('error','登陆失败!');
            echo  "<script>alert('登陆失败');location.href='/home/denglu'</script>";
        }
        

        //校验密码
        if(Hash::check($request->pwd, $users->pwd)){
            //写入session
            session(['Users' => $users]);
            session(['uname'=>$users['uname']]);
            session(['id'=>$users['id']]);
            // return redirect('/')->with('success','登陆成功');
            echo  "<script>alert('登陆成功');location.href='/'</script>";
        }else{
            return back()->with('error','登陆失败!');

      }  

     }

     //退出
    public function loginout()
    {
        session()->flush();
        return redirect('/');
    }





}
