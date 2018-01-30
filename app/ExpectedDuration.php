<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpectedDuration extends Model
{
    //
    protected $fillable =['duration'];

    public function rules()
    {
        return [
            //Validate form input
        'duration'         => 'required|alpha_dash',
          


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }
}
