<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MinisterComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MinisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministerInfos =  MinisterComment::orderBy('id', 'desc')->get();
        return view('admin.minister.index', compact(['ministerInfos']));
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
        //Validation with custom messages
        $validator = Validator::make($request->all(), [
            'minister_name' => ['required', 'string', 'max:50'],
            'minister_title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'minister_image' => 'required|mimes:webp|max:5120', // Only allow webp files
        ], [
            'minister_name.max' => 'Name must not exceed 50 words.',
            'minister_title' => 'Tittle must not exceed 255 words.',
            'description.max' => 'Description not exceeded 500 words.',
            'minister_image.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'minister_image.required' => 'Please upload an image before submitting.',
            'minister_image.max' => 'Image size must not exceed 5MB.',     
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (request()->hasFile('minister_image')) {
            
            $request =request(); 
            $file = $request->file('minister_image');
            //Get filename with extension
            $filenameWithExt = $request->file('minister_image')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();
            
            $fileNamestoStore = $filename. '_'. time() . '.' . $extension;
            $file->move('storage/uploads/minister_images', $fileNamestoStore);

        }else{
            $fileNamestoStore = 'noImage.webp';
        }

        $ministerInfos = new MinisterComment();
        $ministerInfos->minister_name = $request->input('minister_name');
        $ministerInfos->minister_title = $request->input('minister_title');
        $ministerInfos->description = $request->input('description');
        $ministerInfos->minister_image = $fileNamestoStore;
        
        $ministerInfos->save();

        if ($ministerInfos) {
            return response()->json([
                'message' => 'successifully Slide image info saved',
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
        $ministerInfos = MinisterComment::findOrFail($id);
        return response()->json([
            'ministerInfo' => $ministerInfos
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
        $ministerInfos = MinisterComment::findorFail($id);
        
        if ($ministerInfos->minister_image !== 'noImage.webp') {

            //delete image
            Storage::delete('storage/uploads/minister_images/' . $ministerInfos->minister_image);
        }

        $ministerInfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
