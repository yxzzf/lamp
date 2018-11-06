<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Model\Users;
class LoginController extends Controller
{
    // 登录页面显示
    public function login()
    {
        return view('admin.login');
    }
    public function dologin(Request $request)
    {
        // echo 'aaaa';
        if($request -> hasFile('pic')){
            $profile = $request -> file('pic');

            $ext = $profile ->getClientOriginalExtension();

            $file_name = str_random(20).time().'.'.$ext;

            $dir_name = './uploads/'.date('Ymd',time());
           
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');

            }
       $res = Input::except('_token');
        $user = Users::where('uname',$res['uname'])->first();
        //验证密码
        if(Crypt::decrypt($user['pwd']) != trim($res['pwd']))
        {
            return back()->withErrors('密码错误') -> withInput();
        }
        session(['users'=>$users]);
        return redirect('/admin/user');
    }
}