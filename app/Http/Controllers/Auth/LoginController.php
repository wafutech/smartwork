<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email','password'=>'required']);
    
          if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'),'activated'=>1,'banned'=>0])) {
            // Authentication passed...
            return redirect()->intended('/');
        }  

        $error = 'We could not log you in. This may be due to a non-existing account or an account that have not been activated. Check the email you used to signup for an activation email, or contact webmaster for assistance';

    return redirect()->back()->withErrors($error);

        //}
        
            return $next($request);
 
    }

    //Logout a user
    public function logout() {
    
    Auth::logout();
    
    return Redirect::route('login');
}

}
