<?php

namespace App;
use Zizaco\Entrust\EntrustPermission;
use App\Role;


class Permission extends EntrustPermission
{
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
	
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
