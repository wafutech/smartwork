<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientToFreelancerRating extends Model
{
    protected $fillable =['client_id','rate'];

    public function client()
    {
    	return $this->belongsTo('App\HireManager','id');
    }
}
