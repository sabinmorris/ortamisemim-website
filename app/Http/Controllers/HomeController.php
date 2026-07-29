<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function viewusers()
    {
        // Check if logged user is admin
        $loggedUser = Auth::user();
        if ($loggedUser->role === 'admin') {

            // Admin sees all users
            $users = User::all();
        } else {

            // Normal user sees only their own record
            $users = User::where('id', $loggedUser->id)->get();
        }

        return view('auth.index', compact('users'));
    }

    public function showuser($id)
    {
        $user = User::find($id);
        return view('auth.show', compact(['user']));
    }

    public function edituser(Request $request)
    {
        $userinfos = User::findOrFail($request->userId);
        return response()->json([
            'userinfo' => $userinfos
        ]);
    }

    public function updateuser(Request $request)
    {

        $this->validate($request, [
            'namee' => ['required', 'string', 'max:255'],
            'emaill' => ['required', 'string', 'email', 'max:255'],
            'phonee' => ['required'],
            //'rolee' => 'required',
            'user_imagee' => 'mimes:webp|nullable|max:5120', // max 5120kb
            //'status' => 'required'


        ]);

        if (Auth::user()->role == 'admin') {
            $userinfos = User::findOrFail($request->user_id);
            $userinfos->name = $request->input('namee');
            $userinfos->email = $request->input('emaill');
            $userinfos->phone = $request->input('phonee');
            $userinfos->role = $request->input('rolee');
            $userinfos->status = $request->input('statuss');

            if ($request->hasFile('user_imagee')) {
                $destination_path = 'storage/uploads/user_images/' . $userinfos->user_image;
                if (File::exists($destination_path)) {
                    File::delete($destination_path);
                }
                //$request =request(); 
                $file = $request->file('user_imagee');
                //Get filename with extension
                $filenameWithExt = $request->file('user_imagee')->hashName();
                //Get file name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //File Extension
                $extension = $file->extension();

                $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
                $file->move('storage/uploads/user_images', $fileNamestoStore);
            } else {
                $fileNamestoStore = 'noImage.webp';
            }

            if ($request->hasFile('user_imagee')) {

                $userinfos->user_image = $fileNamestoStore;
            }

            $userinfos->update();

            if ($userinfos) {
                return response()->json([
                    'message' => 'Successifully member info Updated',
                    'code' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Interna Server Error',
                    'code' => 500
                ]);
            }
        } else {
            $userinfos = User::findOrFail($request->user_id);
            $userinfos->name = $request->input('namee');
            $userinfos->email = $request->input('emaill');
            $userinfos->phone = $request->input('phonee');
            //$userinfos->role = $request->input('rolee');
            //$userinfos->status = $request->input('statuss');

            if ($request->hasFile('user_imagee')) {
                $destination_path = 'storage/uploads/user_images/' . $userinfos->user_image;
                if (File::exists($destination_path)) {
                    File::delete($destination_path);
                }
                //$request =request(); 
                $file = $request->file('user_imagee');
                //Get filename with extension
                $filenameWithExt = $request->file('user_imagee')->hashName();
                //Get file name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //File Extension
                $extension = $file->extension();

                $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
                $file->move('storage/uploads/user_images', $fileNamestoStore);
            } else {
                $fileNamestoStore = 'noImage.webp';
            }

            if ($request->hasFile('user_imagee')) {

                $userinfos->user_image = $fileNamestoStore;
            }

            $userinfos->update();

            if ($userinfos) {
                return response()->json([
                    'message' => 'Successifully member info Updated',
                    'code' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Interna Server Error',
                    'code' => 500
                ]);
            }
        }
    }

    public function updateuserstatus(Request $request)
    {
        $userInfos = User::findOrFail($request->user_id);
        $userInfos->status = $request->status;
        $userInfos->save();
        if ($userInfos) {
            return response()->json([
                'message' => 'Status updated successfully.',
                'code' => 200

            ]);
        } else {
            return response()->json([
                'message' => 'Inernal Server Error',
                'code' => 500
            ]);
        }
    }
}
