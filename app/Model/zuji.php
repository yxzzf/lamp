<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class zuji extends Model
{
    //
    public function users()
    {
        return $this->belongsTo('App\Model\Users');
    }

    public function shops()
    {
        return $this->belongsTo('App\Model\Shops');
    }
}
