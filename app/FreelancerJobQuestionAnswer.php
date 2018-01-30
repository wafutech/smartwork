<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerJobQuestionAnswer extends Model
{
    protected $table = 'freelancer_job_question_answers';
    protected $fillable = ['job_question_id','freelancer_id','answer'];

    public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer','id');

    }

    public function jobquestion()
    {
    	return $this->belongsTo('App\JobAdditionalQuestion','id');
    }

    public function proposal()
    {
        return $this->belongsTo('App\proposal','id');
    }

    

}
