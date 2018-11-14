<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class zhuangtai extends Model
{
    public function order()
    {
    	return $this->hasMany('App\Model\order');
    }
}
