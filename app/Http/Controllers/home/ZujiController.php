<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Model\Shops;
use App\Model\Users;
use App\Model\Zuji;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ZujiController extends Controller
{
    public function cunzuji()
    {
        $shop_id = $_POST['shop_id'];
        $user_id = \Session::get('homeUser')['id'];
        $res = Zuji::where('user_id',$user_id)
            ->where('shop_id', $shop_id)
            ->first();
        if(!empty($res)){
            $time = date('Y-m-d H:i:s',time());
            $res -> updated_at = $time;
            if($res -> save()){
                echo '11';
            }else{
                echo '00';
            };
        }
        if(empty($res)){
            $zuji = new Zuji;
            $zuji -> user_id = $user_id;
            $zuji -> shop_id = $shop_id;
            if($zuji -> save()){
                echo '1';
            }else{
                echo '0';
            }
        }
    } 

    public function foot()
    {
        $uid = \Session::get('homeUser')['id'];
        $zuji = Zuji::all();
        $shops = Shops::all();
        // $img = DB::table('zujis')
        //     ->join('shops', 'zujis.shop_id', '=', 'shops.sname')
        //     ->select('zujis.*', 'shops.simage')
        //     ->get();
        // $shops -> simage = $shops;
        return view('home.grzx.foot',compact('zuji','shops'));
    }

    public function shanzuji()
    {
        $zuji_id = $_GET['zuji_id'];
        $zuji = Zuji::findOrFail($zuji_id);
        if($zuji->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
