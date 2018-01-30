<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    //
    protected $fillable =['freelancer_id','test_id','start_time','end_time','test_result_link','score','show_on_profile'];


     public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer','id');
    }

    public function test()
    {
    	return $this->belongsTo('App\Test','id');
    }
}
