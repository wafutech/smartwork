<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    protected $fillable =['job_id','freelancer_id','payment_type_id','cover_letter','payment_amount','current_proposal_status_id','client_grade','freelancer_grade','client_comment','freelancer_comment'];

    public function rules()
    {
        return [
            //Validate form input
        'cover_letter'         => 'required|alpha_dash',
          'payment_amount'      => 'required|numeric',
         'client_comment'      => 'alpha_dash',
         'freelancer_comment'      => 'alpha_dash',
         'freelancer_grade'      => 'string',
         
        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
      }

     public function contracts()
    {
    	return $this->hasMany('App\Contract','id');
    }


     public function attachments()
    {
    	return $this->hasMany('App\ProposalAttachment','id');
    }

     public function job()
    {
    	return $this->belongsTo('App\Job','id');
    }

       public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer','id');
    }

       public function paymentype()
    {
    	return $this->belongsTo('App\PaymentType','id');
    }

       public function status()
    {
    	return $this->belongsTo('App\ProposalStatus','id');
    }

    public function milestones()
    {
        return $this->hasMany('App\Projectmilestone');
    }

     public function shortlists()
    {
      return $this->hasMany('App\Short');
    }
}
