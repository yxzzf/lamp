<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
	public $table = 'shops';


    public function cates()
	{
	    return $this->hasOne('App\Model\Cates','id','cates_id');
	}

	public function cate()
    {
    	return $this->belongsTo('App\Model\Cate');
    }
    //n商品对n标签
    public function tags()
    {
    	return $this->belongsToMany('App\Model\Tag');

    }
    //n商品对n口味
    public function flavors()
    {
        return $this->belongsToMany('App\Model\Flavor');
    }

    //n商品对n用户
    public function users()
    {
        return $this->belongsToMany('App\Model\Users');
    }
	public function order()
    {
        return $this->belongsToMany('App\Model\Order');
    }
    public function Order_shop()
    {
        return $this->belongsToMany('App\Model\Order_shop');

    }
}
