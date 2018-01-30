<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobSubcategory;
use App\Skill;

class AjaxRequestsController extends Controller
{
    //
    public function subcategories($id)
    {
    	    $subcategories = JobSubcategory::where('parent_id','=',$id)->pluck('sub_cat_name','id');
    	
        return $subcategories;
    }

      public function skills($id)
    {
    	    $skills = Skill::where('skill_cat_id','=',$id)->pluck('skill','id');
    	
        return $skills;
    }
}
