<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otherskill extends Model
{
    //
    protected $fillable =['job_id','skill_id'];

    public function rules()
    {
        return [
            //Validate form input
        'job_id'         => 'required',
          'skill_id'      => 'required',
         

        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }

      public function job()
    {
    	return $this->belongsTo('App\Job','id');
    }


      public function skill()
    {
    	return $this->belongsTo('App\Skill','id');
    }
}
