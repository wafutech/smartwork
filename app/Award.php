<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable =['user_id','organization','award_desc','date_awarded','award_attachment','award_title','award_link'];

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
