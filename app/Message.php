<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable =['user_id','proposal_id','message','proposal_status_id'];

    

      public function attachment()
    {
    	return $this->hasMany('App\Attachment','id');
    }

      public function replies()
    {
        return $this->hasMany('App\MessageReply','id');
    }

      public function user()
    {
    	return $this->belongsTo('App\User','id');
    }

      
      public function proposal()
    {
    	return $this->belongsTo('App\Proposal','id');
    }

      public function proposalStatus()
    {
    	return $this->belongsTo('App\ProposalStatus','id');
    }
}
