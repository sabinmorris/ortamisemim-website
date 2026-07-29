<?php

namespace App\Http\Controllers\Admin;

use Dom\Attr;
use App\Models\Anouncement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnouncementController extends Controller
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
        $anouncementInfos = Anouncement::orderBy('id', 'desc')->get();
        return view('admin.anouncement.index', compact(['anouncementInfos']));
        
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
            'tittle' => ['required', 'string', 'max:255'],
            'file_name' => 'required|mimes:pdf|max:5120', // Only allow webp files
        ], [
            'file_name.mimes' => 'Invalid file format! Only PDF file are allowed.',
            'file_name.required' => 'Please upload file before submitting.',
            'file_name.max' => 'File size must not exceed 5MB.',
            'tittle.max' => 'Tittle must not exceed 255 word',
            'tittle.required' => 'Please Enter Tittle before submitting',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        if (request()->hasFile('file_name')) {
            
            $request =request(); 
            $file = $request->file('file_name');
            //Get filename with extension
            $filenameWithExt = $request->file('file_name')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();
            
            $fileNamestoStore = $filename. '_'. time() . '.' . $extension;
            $file->move('storage/uploads/anouncement_docs', $fileNamestoStore);

        }else{
            $fileNamestoStore = 'noFile.pdf';
        }

        $anouncementInfos = new Anouncement();
        $anouncementInfos->tittle = $request->input('tittle');
        $anouncementInfos->file_name = $fileNamestoStore;
        
        $anouncementInfos->save();

        if ($anouncementInfos) {
            return response()->json([
                'message' => 'Successifully Anouncement Info Saved',
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
        $anouncementInfos = Anouncement::findOrFail($id);
        return response()->json([
            'anouncementInfo' => $anouncementInfos
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
        $anouncementInfos = Anouncement::findorFail($id);
        
        if ($anouncementInfos->file_name !== 'nofile.pdf') {

            //delete file
            Storage::delete('storage/uploads/anouncement_docs/' . $anouncementInfos->file_name);
        }

        $anouncementInfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
