<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educationlevel extends Model
{
    //
    protected $fillable =['education_level'];
    public function rules()
    {
        return [
            //Validate form input
        'education_level'         => 'required',
          


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
}
