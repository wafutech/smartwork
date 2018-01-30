<?php

namespace App;
use Zizaco\Entrust\EntrustRole;

use Illuminate\Database\Eloquent\Model;

class Role extends EntrustRole
{
    

    protected $fillable = [
       'name',
       'display_name',
       'description'
   ];


   public function rules()
    {
        return [
            //Validate form input
        'name'         => 'required|string',
          'display_name'      => 'required|string',
         'description'      => 'alpha_dash',
         


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
      }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    
}
