<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable =['portfolio_id','user_id','testimony','link','testifier'];

    public function portfolio()
    {
    	return $this->belongsTo('App\FreelancerPortfolio','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
