<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalAttachment extends Model
{
    protected $table = 'proposal_attachments';

    protected $fillable =['proposal_id','attachment_path'];
    
    public function rules()
    {
        return [
            //Validate form input
        'proposal_id'         => 'required',        
         
         'attachment' => 'mimes:pdf,doc,docx,xls,xlsx,pnt|size:5120',


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

       public function proposal()
    {
    	return $this->belongsTo('App\Proposal','id');
    }
}
