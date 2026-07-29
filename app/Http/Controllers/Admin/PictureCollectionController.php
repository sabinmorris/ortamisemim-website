<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PictureCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PictureCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictureInfos = PictureCollection::orderBy('id', 'desc')->get();
        return view('admin.pictures.index', compact(['pictureInfos']));
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
            'pictureName' => ['required', 'string', 'max:255'],
            'position' => 'required',
            'picture' => 'required|mimes:webp|max:5120', // Only allow webp files
        ], [
            'picture.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'picture.required' => 'Please upload an image before submitting.',
            'picture.max' => 'Image size must not exceed 5MB.',
            'pictureName.max' => 'Name must not exceed 255 word',
            'position.required' => 'Fill postion required',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (request()->hasFile('picture')) {

            $request = request();
            $file = $request->file('picture');
            //Get filename with extension
            $filenameWithExt = $request->file('picture')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/aboutpictures', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        $pictureInfos = new PictureCollection();
        $pictureInfos->pictureName = $request->input('pictureName');
        $pictureInfos->position = $request->input('position');
        $pictureInfos->picture = $fileNamestoStore;

        $pictureInfos->save();

        if ($pictureInfos) {
            return response()->json([
                'message' => 'successifully about us image info saved',
                'code' => 200
            ]);
        } else {
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
        $pictureInfos = PictureCollection::findOrFail($id);
        return response()->json([
            'pictureInfo' => $pictureInfos
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
        $pictureInfos = PictureCollection::findorFail($id);

        if ($pictureInfos->picture !== 'nofile.webp') {

            //delete picha
            Storage::delete('storage/uploads/aboutpictures/' . $pictureInfos->picture);
        }

        $pictureInfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
