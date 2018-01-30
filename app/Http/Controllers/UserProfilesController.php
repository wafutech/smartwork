<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Freelancer;
use Auth;
use Validator;
use App\Userprofile;
use App\Country;
use App\JobCategory;
use App\SkillCategory;
use App\Skill;
use App\FreelancerLevel;
use App\FreelancerPortfolio;
use App\ClientComment;
use App\Job;
use App\Stat;
use App\Proposal;
use App\HireManager;
use DB;
class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      var $countries;
      var $skillCategories;
      var $skills;
      public function __construct()
    {
        $this->middleware(['auth']);
        $this->countries = Country::pluck('country_name','id');
        $this->skillCategories = SkillCategory::pluck('skill_category','id');
        $this->skills = Skill::pluck('skill','id');
        $this->experienceLevels = FreelancerLevel::pluck('level','id');


    }
    public function index()
    {
        //check if the user is a freelancer and 
        //redirect to freelancer profile
        $isFreelancer = Freelancer::where('user_id',Auth::User()->id);
        if($isFreelancer)
        {
            
            $profile = DB::table('userprofiles')
                        ->join('countries','country_id','userprofiles.country_id','countries.id')
                    ->where('userprofiles.user_id',Auth::User()->id)->first();
            $freelancers = DB::table('freelancers')
                            ->join('freelancer_levels','experience_level','freelancers.experience_level','freelancer_levels.id')
                            ->join('skill_categories','main_skill_id','freelancers.main_skill_id','skill_categories.id')
                            ->where('freelancers.user_id',Auth::User()->id)
                            ->first();

            $freelancer = Freelancer::where('user_id',Auth::User()->id)->first();
            $skills = DB::table('has_skills')
                        ->join('skills','skill_id','skills.id','has_skills.skill_id')
                        ->where('has_skills.freelancer_id',$freelancer->id)
                        ->get();
            $portfolios = FreelancerPortfolio::where('freelancer_id',$freelancer->id)->get();
            $comments = ClientComment::where('freelancer_id',$freelancer->id)->get();

        return view('profiles.index',['title'=>'Your Profile','profile'=>$profile,'skills'=>$skills,'freelancers'=>$freelancers,'portfolios'=>$portfolios,'comments'=>$comments]);
                       

        }
//Else is a hire manager, generate hire manager profile

        



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check if the user has completed his profile, if not redirect the user to complete basic user profile first
        $userProfile = Userprofile::where('user_id',Auth::User()->id)->first();
        if(!$userProfile)
        {
            return view('profiles.create',['title'=>'Complete Personal Information','countries'=>$this->countries,'step'=>'Step 2']);
        }
            //Check if the logged in user is freelancer
            $_isfreelancer = Freelancer::where('user_id',Auth::User()->id)->first();

            //If is not a freelancer then check if is an employer
        if($_isfreelancer==Null)
        {
            
            return Redirect::route('jobs.index');

           /* $freelancer = Freelancer::where('user_id',Auth::User()->id)->first();
        $jobs = DB::table('jobs')
        ->where('job_status',1)
        ->where('main_skill_id',$freelancer->main_skill_id)
        ->orderBy('jobs.created_at','desc')
         ->paginate(10);
         if(!$jobs->isEmpty())
         {
    return view('jobs.index',['title'=>'Available Jobs','jobs'=>$jobs]);
  
         }
         $info = 'No jobs were found matching your skills, please check again later.';
         return Redirect::back()->withErrors($info);*/
        }

        else
        {

            $_isEmployer = HireManager::where('user_id',Auth::User()->id)->first();
            if($_isEmployer)
            {
                return Redirect::route('employerProfile');
            }

        }
        return view('freelancers.create',['title'=>'Complete Profile','countries'=>$this->countries,'step'=>'Step 3','skillcategories'=>$this->skillCategories,'skills'=>$this->skills,'experience_levels'=>$this->experienceLevels]);
        
       
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
            
  //Validate form input
        'user_id'         => 'required',
          'first_name'      => 'required|string',
         'last_name'      => 'required|string',
         'phone'      => 'numeric',
         'sex'      => 'required|string',
         'address'      => 'required|string',
         'city'      => 'required|string',

         'zip'      => 'required|numeric|digits:5',
        'country_id'      => 'required',


         'region'      => 'required|string',

       
          
      );
    $validator = Validator::make(Input::all(), $validation_rules);
     // Return back to form w/ validation errors & session data as input
     if($validator->fails()) {
        return  Redirect::back()->withErrors($validator)->withInput();
    }

       
        $profile = new Userprofile;
        $profile->user_id = Auth::User()->id;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->phone = $request->input('phone');
        $profile->sex = $request->input('sex');
        $profile->address = $request->input('address');
        $profile->city = $request->input('city');
        $profile->zip = $request->input('zip');
        $profile->country_id = $request->input('country_id');
        $profile->region = $request->input('region');
        $profile->save();

        //redirect to the next step

    return view('confirm_user',['title'=>'Confirm']);        

          //return view('freelancers.create',['title'=>'Complete Profile','countries'=>$this->countries,'step'=>'Step 3','skillcategories'=>$this->skillCategories,'skills'=>$this->skills,'experience_levels'=>$this->experienceLevels]);
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
        //
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
        $profile = Userprofile::where('user_id',$id)->first();
        $profile->update($input);
        //$profile = Userprofile::find($id);
        return response($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Userprofile::where('user_id',$id)->first();
        return $profile->delete();
    }
}
