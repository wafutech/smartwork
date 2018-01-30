<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $guarded =['id'];
    //Define relationship

    public function rules()
    {
        return [
            //Validate form input
        'message_id'         => 'required',
        'attachment' => 'mimes:pdf,doc,docx,xls,xlsx,pnt|size:5120',


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }

    public function message()
    {
    	return $this->belongsTo('App\Message','id');
    }
}
