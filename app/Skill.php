<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable =['skill'];

    public function rules()
    {
        return [
            //Validate form input
        'skill'         => 'required|string|unique:skills',
          


        ];

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($v->errors())
            ->withInput(Input::all());
        }
    }

        public function skillcategory()
        {
            return $this->belongsTo('App\SkillCategory');
        }

}
