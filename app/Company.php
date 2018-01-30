<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable =['company_name','country_id','region','company_desc'];

    public function rules()
    {
        return [
            //Validate form input
        'company_name'         => 'required|alpha_dash',
          'company_desc'      => 'required|alpha_dash',
         'country_id'      => 'required',
         'region'      => 'required|string',
        


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }

    public function county()
    {
    	return $this->belongsTo('App\Country','id');
    }

     public function hiremanagers()
    {
    	return $this->hasMany('App\HireManager','id');
    }

}
