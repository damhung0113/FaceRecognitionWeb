<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $messages=[
            "email.required" => "Email is required",
            "password.required" => "Password is required",
        ];
        $v = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], $messages);
       if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }else{
            $email = $request->input("email");
            $password = $request->input("password");
            $user = User::where('email', $email)->first();
            if ($user) {
                if ($user->password === $password) {
                    if ($user->role === 1) {
                        
                        return redirect()->route('teacher');
                    } else {
                        return redirect()->route('student');
                    }
                } else {
                    return redirect()->back()->withInput()->withErrors([
                        'password' => 'Wrong Password',
                    
                    ]);
                }
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'email' => 'Wrong Email',
                
                ]);
            }
        }
}
