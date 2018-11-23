<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Dizhis;
use App\Model\Links;
        


use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        error_reporting( E_ALL&~E_NOTICE );
        // 接收收货地址id
        $dz=$request->input('dizhi');
        // 接收
        $sid = $request->input('sname');
        // 获取用户id
        $uid = session('id');
        // 订单号生成
        $code = 'dZ_'.time().rand();
        // 生成订单
        $ord = new Order;
        for($i=0;$i<count($sid);$i++){
            $data=array();
            $data['ddh']=$code;
            $data['created_at'] = date('Y-m-d H:i:s',time());
            $data['uid']=$uid;
            $data['sid']=$sid[$i];
            $data['dizhi']=$dz[$i];
            DB::table('orders')->insert($data);

        }
       return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        
        $data = Order::find($id);
        $aa = $data->nid;
        $add = Dizhis::where('dizhi','=',$aa)->get();
        return view('home.Order.fk',['data'=>$data,'add'=>$add]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        $data = $request -> except('_token');    
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        $data['ddhao'] = 'dd_'.time().rand(1000,9999);
        $data['nid'] = session('users')->id;
        $res = DB::table('odrder')->insert($data);       
        $id = $data['uid']; 
        if($res){
            return redirect('/home/Order/success/'.$id.'');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSuccess(Request $request, $id)
    {
        $aa = session('user')->id;
        $data = Order::where('uid','=',$id)->get();
        $add = Dizhis::where('dizhi','=',$aa)->get();
        return view('home.Order.success',['data'=>$data,'add'=>$add]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $data = Order::find($id);
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        $data->num = $request->input('num','');
        $data->name = $request->input('name','');
        $data->phone = $request->input('phone','');
        $data->sheng = $request->input('sheng','');
        $data->shi = $request->input('shi','');
        $data->xian = $request->input('xian','');
        $data->kdi = $request->input('kdi','');
        $data->zhifu = $request->input('zhifu','');
        $data->add = $request->input('add','');
        $data['nid'] = session('user')->id;
        $id = session('user')->id;
        $data['status'] = 3;
        if($data->save()){
            return redirect('/home/Order/index/'.$id.'')->with('success','付款成功');
        }else{
            return back()->with('error', '付款失败');
        }

    }

    //退款
    public function getTui($id)
    {
        $data = Order::find($id);
        $data['status'] = 1;
        $data['tuis'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        $id = session('user')->id;
        if($data->save()){
            return redirect('/home/Order/tkuan/'.$id.'')->with('success','跳转成功');
        }else{
            return back()->with('error', '跳转失败');
        }
    }

    //退款
    public function getTkuan($id)
    {   
        $data = Order::where('tuis','<','2')->where('nid','=',$id)->get();
        return view('home.Order.tkuan',['data'=>$data]);
    }

    //取消退款
    public function getQxiao($id)
    {        
        $data = Order::find($id);
        $data['status'] = 3;
        $data['tuis'] = '3';
        $id = session('user')->id;
        if($data->save()){
            return redirect('/home/Order/tkuan/'.$id.'')->with('success','跳转成功');
        }else{
            return back()->with('error', '跳转失败');
        }
    }

    public function getQren($id)
    {
        $data = Order::find($id);
        $data['status'] = 5;
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        $id = $data->nid;

        if($data->save()){
            return redirect('/home/Order/index/'.$id.'')->with('success','');
        }else{
            return back()->with('error', '');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        $res = Order::destroy($id);
        $id = session('user')->id;
        if($res){
            return redirect('/home/Order/index/'.$id.'')->with('success','删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}
