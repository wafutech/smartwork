<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Permission;
use App\Role;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Input;
use App\Mail\EmailVerification;
use DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/activation';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //assign default role
        $default_role = 'freelancer';
        $user = User::where('email', '=', $data['email'])->first();

        $role = Role::where('name', '=', $default_role)->first();
        $user->attachRole($role->id);

        //Email user credentials

        $to = $data['email'];
        $password = Input::get('password');
        
        Mail::to($to)->send(new NewUser($user,$password));

         return view('auth.activation.pre_activation',['user'=>$user]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_code' => str_random(32),

        ]);
    }

    //show registration form
    public function registrationForm()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails()) 
    {
        $this->throwValidationException($request, $validator);
    }
    // Using database transactions is useful here because stuff happening is actually a transaction
    // I don't know what I said in the last line! Weird!
    DB::beginTransaction();
    try
    {
        $user = $this->create($request->all());
        // After creating the user send an email with the random token generated in the create method above
        $email = new EmailVerification(new User(['activation_code' => $user->activation_code, 'name' => $user->name]));
        Mail::to($user->email)->send($email);
        DB::commit();
         return view('auth.activation.pre_activation',['user'=>$user]);
    }
    catch(Exception $e)
    {
        DB::rollback(); 
        return back();
    }

}


    // Get the user who has the same token and change his/her status to verified i.e. 1
public function verify($token)
{
    // The verified method has been added to the user model and chained here
    // for better readability
    User::where('activation_code',$token)->firstOrFail()->verified();
    return redirect('login')->with('message','Activation Successful, LOGIN!');
}

   
}
