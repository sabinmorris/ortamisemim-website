<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leadership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LeadershipController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leaderInfos = Leadership::orderBy('id', 'desc')->get();
        return view('admin.leaders.index', compact(['leaderInfos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'role' => 'required',
            'designation' => 'required',
            'description' => ['required', 'string', 'max:500'],
            'leader_image' => 'required|mimes:webp|max:5120', // Only allow webp files
        ], [
            'leader_image.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'leader_image.required' => 'Please upload an image before submitting.',
            'leader_image.max' => 'Image size must not exceed 5MB.',
            'role.required' => 'please enter role before submiting',
            'designation.required' => 'Please enter designation before submiting',
            'description.max' => 'Description must not exceeded 500 words',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (request()->hasFile('leader_image')) {
            
            $request =request(); 
            $file = $request->file('leader_image');
            //Get filename with extension
            $filenameWithExt = $request->file('leader_image')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();
            
            $fileNamestoStore = $filename. '_'. time() . '.' . $extension;
            $file->move('storage/uploads/leader_images', $fileNamestoStore);

        }else{
            $fileNamestoStore = 'noImage.webp';
        }

        $leaderInfos = new Leadership();
        $leaderInfos->name = $request->input('name');
        $leaderInfos->role = $request->input('role');
        $leaderInfos->designation = $request->input('designation');
        $leaderInfos->description = $request->input('description');
        $leaderInfos->leader_image = $fileNamestoStore;
        
        $leaderInfos->save();

        if ($leaderInfos) {
            return response()->json([
                'message' => 'successifully leader info saved',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
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
        $leaderInfos =  Leadership::findOrFail($id);
        return response()->json([
            'leaderInfo' => $leaderInfos
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leaderInfos = Leadership::findorFail($id);
        
        if ($leaderInfos->leader_image !== 'noImage.webp') {

            //delete image
            Storage::delete('storage/uploads/leader_images/' . $leaderInfos->leader_image);
        }

        $leaderInfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
