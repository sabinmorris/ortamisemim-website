<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\contracts\Mail\Mailable;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'role' => ['required'],
            'user_image' => 'mimes:webp|required|max:5120', // max 5120kb
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (request()->hasFile('user_image')) {
            
            $data =request(); 
           echo $file = $data->file('user_image');
            //Get filename with extension
            $filenameWithExt = $data->file('user_image')->getClientOriginalName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->getClientOriginalExtension();
            
            $fileNamestoStore = $filename. '_'. time() . '.' . $extension;
            $file->move('storage/uploads/user_images', $fileNamestoStore);

        }else{
            $fileNamestoStore = 'noImage.webp';
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'user_image' => $fileNamestoStore,
            'verifyToken' => Str::random(40),
            // 'password' => Hash::make($data['password']),
        ]);

        // $thisUser = User::findOrFail($user->id);
        // $this->sendEmail($thisUser);
        // return $user;
    }

    // public function sendEmail($thisUser){
    //     Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    // }

    // public function verifyMailFirst(){
    //     return view('auth.verifyEmail');
    // }

    // public function sendEmailDone($email, $verifyToken){
    //     return $email;
    // }

    
    
}
