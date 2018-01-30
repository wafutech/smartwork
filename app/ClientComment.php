<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientComment extends Model
{
    protected $table = 'client_comments';
    protected $fillable =['hire_manager_id','freelancer_id','comment'];

    public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer');
    }

     public function hiremanager()
    {
    	return $this->belongsTo('App\HireManager');
    }

}
