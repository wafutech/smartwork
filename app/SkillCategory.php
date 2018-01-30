<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    //
    protected $fillable = ['skill_category'];

    public function skills()
    {
    	return $this->hasMany('App\Skill');
    }
}
