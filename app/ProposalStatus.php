<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalStatus extends Model
{
    //
    protected $fillable = ['status_name'];

    public function rules()
    {
        return [
            //Validate form input
        'status_name'         => 'required|string|unique:proposal_statuses',
          


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
}
