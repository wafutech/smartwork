<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    //
    protected $table = 'userprofiles';
    protected $fillable =['user_id','first_name','last_name','phone','sex','address','country_id','city','zip','region','avatar'];
    public function rules()
    {
        return [
            //Validate form input
        'user_id'         => 'required',
          'first_name'      => 'required|string',
         'last_name'      => 'required|string',
         'phone'      => 'numeric',
         'sex'      => 'required|string',
         'address'      => 'required|alpha_numeric',
         'city'      => 'required|string',

         'zip'      => 'required|numeric|digits:5',

         'region'      => 'required|string',

         'avatar'      => 'image|mimes:jpeg,gif,png,jpg',
      


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
