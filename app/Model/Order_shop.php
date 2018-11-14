<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_shop extends Model
{
    //
     protected $table = 'order_shop';

    public function order()
    {
        return $this->belongsTo('App\Model\order');
    }

    public function shops()
    {
        return $this->belongsTo('App\Shops');
    }

    public function Kows()
    {
        return $this->belongsTo('App\Model\Kows');
    }

    public function Baoshuangs()
    {
        return $this->belongsTo('App\Model\Baoshuangs');
    }
}
