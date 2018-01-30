<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSubcategory extends Model
{
    //
    protected $fillable = ['parent_id','sub_cat_name','sub_cat_desc'];

    public function rules()
    {
        return [
            //Validate form input
        'parent_id'         => 'required',
          'sub_cat_name'      => 'required|string|unique:job_subcategories',
         'sub_cat_desc'      => 'required|alpha_dash',
         
        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

       public function jobcategory()
    {
    	return $this->belongsTo('App\JobCategory','id');
    }


}
