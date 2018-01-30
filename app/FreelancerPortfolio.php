<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerPortfolio extends Model
{
    protected $table ='freelancer_portfolios';
    protected $fillable =['freelancer_id','user_id','portfolio_image','portfolio_desc','portfolio_link','portforlio_title'];

    public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer');

    }

     public function user()
    {
    	return $this->belongsTo('App\User');
    	
    }

    public function testimonies()
    {
        return $this->hasMany('App\Testmony');
    }
}
