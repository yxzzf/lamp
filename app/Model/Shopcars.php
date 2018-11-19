<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopcars extends Model
{
    public function shops()
    {
    	return $this->belongsTo('App\Model\Shops','id','shops_id');
    }
    public function kows()
    {
        return $this->hasOne('App\Model\Kows','id','kows_id');
    }
    public function baozhuangs()
    {
        return $this->hasOne('App\Model\Baozhuangs','id','baozhuangs_id');
    }


}
