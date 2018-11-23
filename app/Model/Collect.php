<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    //
     public $table = 'collect';
    public function users()
    {
        return $this->belongsTo('App\Model\Users');
    }

    public function shop()
    {
        return $this->belongsTo('App\Model\Shops','shop_id','sname');
    }
}
