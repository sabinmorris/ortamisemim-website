<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request)
    {
        
        
            if (Auth::user()->role == 'admin') {
                return redirect('/admin-dashboard')->with('status','Welcome Admin');
            } elseif (Auth::user()->role == 'editor') {
                return redirect('/admin-dashboard')->with('status','Welcome Admin');
            }elseif (Auth::user()->role == 'writer') {
                return redirect('/admin-dashboard')->with('status','Welcome Admin');
            }else {
                return redirect()->back()->with('message', 'Please Login First');
            }
        
        
        
    }

    protected function credentials(Request $request)
    {
        
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => '1'];
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
