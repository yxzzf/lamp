<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lunbotus extends Model
{
     protected $table = 'lunbotus';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
