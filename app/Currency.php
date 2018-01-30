<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
     public function jobs()
    {
      return $this->hasMany('App\Job');
    }
}
