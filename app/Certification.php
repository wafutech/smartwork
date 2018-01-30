<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //
    protected $fillable =['freelancer_id','certification_name','provider','attachment','date_earned','certification_link'];

    public function rules()
    {
        return [
            //Validate form input
        'freelancer_id'  => 'required',
          'certification_name' => 'required|alpha_dash',
         'provider'      => 'required|alpha_dash',
         'description'      => 'required|string',
        'date_earned'      => 'required|date',
         'certification_link'      => 'url',
         
        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

    public function freelancer()
    {
    	return $this->belongsTo('App\Freelancer','id');
    }
}
