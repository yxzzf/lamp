<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $dates = ['deleted_at'];
    //n 个 订单 对应 1 个物流
    public function wuliu()
    {
        return $this->belongsTo('App\Model\Wuliu');
    }
    //n 个 订单 对应 1 个支付方式
    public function zhifu()
    {
    	return $this->belongsTo('App\Model\Zhifu');
    }

    public function Users()
    {
        return $this->belongsTo('App\Model\Users');
    }

    public function shops()
    {
        return $this->belongsToMany('App\Model\Shops');
    }

    public function order_shop()
    {
        return $this->hasMany('App\Model\Order_shop');
    }
    public function zhuangtai()
    {
        return $this->belongsTo('App\Model\zhuangtai');
    }

}
