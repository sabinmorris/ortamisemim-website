<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function passwordform(){
        return view('admin.changepswd.changepassword');
    }

    public function updatepassword(Request $request){
        $this->validate($request, [

    		'oldpassword' => 'required',
    		'newpassword' => 'required|min:6',
    		'comfirmpassword' => 'same:newpassword',

    	]);

    	$data = $request->all();

        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['oldpassword'], $user->password)) {
            return back()->with('error', 'The specified password does not match with the old password');
        } else { 

    	$passwordchange = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
        
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
    	
        return view('auth.login', compact('passwordchange'))->with('success', 'successifull password updated');
        // return $request->wantsJson()
        //     ? new JsonResponse([], 204)
        //     : redirect('/');
    }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
