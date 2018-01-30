<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

use App\SkillCategory;


class SkillsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill_categories = SkillCategory::all();
        return view('skills.categories.index',['title'=>'Skill Categories',$categories=>$this->skill_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.categories.create',['title'=>'Add New Skill Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validation_rules = array(
            
    'skill_category'      => 'required|string', 
  
         
          
      );
    $validator = Validator::make(Input::all(), $validation_rules);
     // Return back to form w/ validation errors & session data as input
     if($validator->fails()) {
        return  Redirect::back()->withErrors($validator)->withInput();
    }

        /* $category = new SkillCategory;
         $category->skill_category=$request->input('skill_category');
         $category->save();*/
         $input =$request->all();
        
        $create = SkillCategory::create($input);
        return Redirect::back()->with('message','Skill Category Added');

        
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = SkillCategory::findOrFail($id);
        return response($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        Skill::where('id',$id)->update($input);
        $skill = SkillCategory::find($id);
        return response($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $skill = SkillCategory::findOrFail($id);
        return $skill->delete();
    }
}
