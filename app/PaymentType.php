<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    //
    protected $fillable = ['payment_type'];

    public function rules()
    {
        return [
            //Validate form input
        'payment_type'         => 'required',
          
        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

     public function jobs()
    {
    	return $this->hasMany('App\Job','id');
    }

}
