<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $dates = ['deleted_at'];
	public $table = 'shops';


    public function cates()
	{
	    return $this->hasOne('App\Model\Cates','id','cates_id');
	}

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    //n商品对n口味
    public function kows()
    {
        return $this->belongsToMany('App\Model\Kows');
    }

    //n商品对n用户
    public function users()
    {
        return $this->belongsToMany('App\Model\Users');
    }

     public function baozhuangs()
    {
        
        return $this->belongsToMany('App\Model\baozhuangs');

    }   
    

    public function shopcars()
    {
        return $this->belongsToMany('App\Shop');

    }

}
