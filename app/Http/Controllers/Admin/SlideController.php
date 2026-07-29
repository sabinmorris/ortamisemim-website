<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
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
        $slideInfos = Slide::orderBy('id', 'desc')->get();
        return view('admin.slides.index', compact(['slideInfos']));
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

        // Validation with custom messages
        $validator = Validator::make($request->all(), [
            'tittle' => ['required', 'string', 'max:255'],
            'caption' => ['required', 'string', 'max:255'],
            'slide_image' => 'required|mimes:webp|max:5120', // Only allow webp files
        ], [
            'slide_image.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'slide_image.required' => 'Please upload an image before submitting.',
            'slide_image.max' => 'Image size must not exceed 5MB.',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (request()->hasFile('slide_image')) {

            //$request =request(); 
            $file = $request->file('slide_image');
            //Get filename with extension
            $filenameWithExt = $request->file('slide_image')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/slide_images', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        $slideInfo = new Slide();
        $slideInfo->tittle = $request->input('tittle');
        $slideInfo->caption = $request->input('caption');
        $slideInfo->slide_image = $fileNamestoStore;

        $slideInfo->save();

        if ($slideInfo->save()) {
            return response()->json([
                'message' => 'successifully Slide image info saved',
                'data' => $slideInfo,
                'code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ], 500);
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
        $slideinfos = Slide::findOrFail($id);
        return response()->json([
            'slideinfo' => $slideinfos
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
        $slideinfos = Slide::findorFail($id);

        if ($slideinfos->slide_image !== 'noImage.webp') {

            //delete image
            Storage::delete('storage/uploads/slide_images/' . $slideinfos->slide_image);
        }

        $slideinfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
