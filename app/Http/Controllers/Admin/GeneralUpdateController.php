<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Slide;
use App\Models\Video;
use App\Models\AboutUs;
use App\Models\Leadership;
use App\Models\Anouncement;
use App\Models\UploadedDocs;
use Illuminate\Http\Request;
use App\Models\MinisterComment;
use App\Models\DepartmentService;
use App\Models\PictureCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GeneralUpdateController extends Controller
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

    //Update slide status only
    public function updateslidestatus(Request $request)
    {
        $slideInfo = Slide::findOrFail($request->slide_id);
        $slideInfo->status = $request->status;
        $slideInfo->save();
        if ($slideInfo) {
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

    //Update slides info
    public function updateslide(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'tittlee' => ['required', 'string', 'max:255'],
            'captionn' => ['required', 'string', 'max:255'],
            'slide_imagee' => 'nullable|mimes:webp|max:5120', // Only allow webp files
            'statuss' => 'required',
        ], [
            'slide_imagee.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'slide_imagee.required' => 'Please upload an image before submitting.',
            'slide_imagee.max' => 'Image size must not exceed 5MB.',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $slideInfo = Slide::findOrFail($request->slideid);
        $slideInfo->tittle = $request->input('tittlee');
        $slideInfo->caption = $request->input('captionn');
        $slideInfo->status = $request->input('statuss');

        if ($request->hasFile('slide_imagee')) {
            $destination_path = 'storage/uploads/slide_images/' . $slideInfo->slide_image;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('slide_imagee');
            //Get filename with extension
            $filenameWithExt = $request->file('slide_imagee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/slide_images', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        if ($request->hasFile('slide_imagee')) {

            $slideInfo->slide_image = $fileNamestoStore;
        }

        $slideInfo->update();

        if ($slideInfo) {
            return response()->json([
                'message' => 'Successifully slide info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    //update post status only
    public function updatepoststatus(Request $request)
    {

        $postInfo = Post::findOrFail($request->postid);
        $postInfo->post_status = $request->status;
        $postInfo->save();
        if ($postInfo) {
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

    //Function to update post
    public function updatepost(Request $request)
    {

        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'post_tittlee' => ['required', 'string', 'max:255'],
            'post_descriptionn' => ['required', 'string', 'max:500'],
            'post_imagee' => 'nullable|mimes:webp|max:5120', // Only allow webp files
        ], [
            'post_imagee.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'post_imagee.max' => 'Image size must not exceed 5MB.',
            'post_tittlee.max' => 'Post tittle must not exceed 255 word',
            'post_descriptionn.max' => 'Post description not exceeded 500 words',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $postInfo = Post::findOrFail($request->postid);
        $postInfo->post_tittle = $request->input('post_tittlee');
        $postInfo->post_description = $request->input('post_descriptionn');
        $postInfo->post_status = $request->input('post_status');

        if ($request->hasFile('post_imagee')) {
            $destination_path = 'storage/uploads/post_images/' . $postInfo->post_image;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('post_imagee');
            //Get filename with extension
            $filenameWithExt = $request->file('post_imagee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/post_images', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        if ($request->hasFile('post_imagee')) {

            $postInfo->post_image = $fileNamestoStore;
        }

        $postInfo->update();

        if ($postInfo) {
            return response()->json([
                'message' => 'Successifully post info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }


    //function to update anoucement status only
    public function updateanouncementstatus(Request $request)
    {

        $anouncementInfo = Anouncement::findOrFail($request->anouncement_id);
        $anouncementInfo->status = $request->status;
        $anouncementInfo->save();
        if ($anouncementInfo) {
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

    //function to update anouncement info from db
    public function updateanounce(Request $request)
    {
        //Validation with custom messages
        $validator = Validator::make($request->all(), [
            'tittlee' => ['required', 'string', 'max:255'],
            'file_namee' => 'nullable|mimes:pdf|max:5120', // Only allow pdf files
            'status' => 'required',
        ], [
            'file_namee.mimes' => 'Invalid file format! Only PDF file are allowed.',
            'file_namee.required' => 'Please upload file before submitting.',
            'file_namee.max' => 'File size must not exceed 5MB.',
            'tittlee.max' => 'Tittle must not exceed 255 word',
            'tittlee.required' => 'Please Enter Tittle before submiting',
            'status.required' => 'Please select status before submiting'
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $anouncementInfo = Anouncement::findOrFail($request->anoucementId);
        $anouncementInfo->tittle = $request->input('tittlee');
        $anouncementInfo->status = $request->input('status');

        if ($request->hasFile('file_namee')) {
            $destination_path = 'storage/uploads/anouncement_docs/' . $anouncementInfo->file_name;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('file_namee');
            //Get filename with extension
            $filenameWithExt = $request->file('file_namee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/anouncement_docs', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noFile.pdf';
        }

        if ($request->hasFile('post_imagee')) {

            $anouncementInfo->file_name = $fileNamestoStore;
        }

        $anouncementInfo->update();

        if ($anouncementInfo) {
            return response()->json([
                'message' => 'Successifully anouncement info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update minister description status only
    public function updateministerstatus(Request $request)
    {

        $anouncementInfos = MinisterComment::findOrFail($request->descriptionId);
        $anouncementInfos->status = $request->status;
        $anouncementInfos->save();
        if ($anouncementInfos) {
            return response()->json([
                'message' => 'Status updated successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update minister description
    public function updateministerdescription(Request $request)
    {
        //Validation with custom messages
        $validator = Validator::make($request->all(), [
            'minister_namee' => ['required', 'string', 'max:50'],
            'minister_titlee' => ['required', 'string', 'max:255'],
            'descriptionn' => ['required', 'string', 'max:5000'],
            'minister_imagee' => 'nullable|mimes:webp|max:5120', // Only allow webp files
            'status' => 'required',
        ], [
            'minister_imagee.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'minister_imagee.required' => 'Please upload an image before submitting.',
            'minister_imagee.max' => 'Image size must not exceed 5MB.',
            'minister_namee.max' => 'Post tittle must not exceed 50 words',
            'minister_titlee' => 'Tittle must not exceed 255 words',
            'descriptionn.max' => 'Description not exceeded 500 words',
            'status.required' => 'Please select status before submiting',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $anouncementInfos = MinisterComment::findOrFail($request->descriptionid);
        $anouncementInfos->minister_name = $request->input('minister_namee');
        $anouncementInfos->minister_title = $request->input('minister_titlee');
        $anouncementInfos->description = $request->input('descriptionn');
        $anouncementInfos->status = $request->input('status');

        if ($request->hasFile('minister_imagee')) {
            $destination_path = 'storage/uploads/anouncement_docs/' . $anouncementInfos->minister_image;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('minister_imagee');
            //Get filename with extension
            $filenameWithExt = $request->file('minister_imagee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/minister_images', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        if ($request->hasFile('minister_imagee')) {

            $anouncementInfos->minister_image = $fileNamestoStore;
        }

        $anouncementInfos->update();

        if ($anouncementInfos) {
            return response()->json([
                'message' => 'Successifully anouncement info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    // functin to update about us status only
    public function updateaboutstatus(Request $request)
    {

        $aboutUsInfo = AboutUs::findOrFail($request->about_id);
        $aboutUsInfo->status = $request->status;

        $aboutUsInfo->save();
        if ($aboutUsInfo) {
            return response()->json([
                'message' => 'Status updated successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update about us Info
    public function updateboutus(Request $request)
    {
        //Validation with custom messages
        $validator = Validator::make($request->all(), [
            'titlee' => ['required', 'string', 'max:255'],
            'descriptionn' => ['required', 'string', 'max:5000'],
            'status' => 'required', // Only allow webp files
        ], [
            'descriptionn.max' => 'Description must not exceed 5000 word',
            'status.required' => 'required status',
            'titlee.required' => 'Tittle required',
            'titlee.max' => 'tittle must not exceed 255 word.',
        ]);
        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $aboutUsInfo = AboutUs::findOrFail($request->aboutId);
        $aboutUsInfo->title = $request->input('titlee');
        $aboutUsInfo->description = $request->input('descriptionn');
        $aboutUsInfo->status = $request->input('status');

        $aboutUsInfo->update();

        if ($aboutUsInfo) {
            return response()->json([
                'message' => 'Successifully about us info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    //function to update leader status only
    public function updateleaderstatus(Request $request)
    {

        $leaderInfo = Leadership::findOrFail($request->leaderId);
        $leaderInfo->status = $request->status;
        $leaderInfo->save();
        if ($leaderInfo) {
            return response()->json([
                'message' => 'Status updated successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update leaders info to the Db
    public function updateleader(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'namee' => ['required', 'string', 'max:255'],
            'rolee' => 'required',
            'designationn' => 'required',
            'descriptionn' => ['required', 'string', 'max:500'],
            'leader_imagee' => 'nullable|mimes:webp|max:5120', // Only allow webp files
            'status' => 'required',
        ], [
            'leader_imagee.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'leader_imagee.required' => 'Please upload an image before submitting.',
            'leader_imagee.max' => 'Image size must not exceed 5MB.',
            'rolee.required' => 'please enter role before submiting',
            'designationn.required' => 'Please enter designation before submiting',
            'descriptionn.max' => 'Description must not exceeded 500 words',
            'status.required' => 'Please select status before submiting',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $leaderInfo = Leadership::findOrFail($request->leaderId);
        $leaderInfo->name = $request->input('namee');
        $leaderInfo->role = $request->input('rolee');
        $leaderInfo->designation = $request->input('designationn');
        $leaderInfo->description = $request->input('descriptionn');
        $leaderInfo->status = $request->input('status');

        if ($request->hasFile('leader_imagee')) {
            $destination_path = 'storage/uploads/leader_images/' . $leaderInfo->leader_image;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('leader_imagee');
            //Get filename with extension
            $filenameWithExt = $request->file('leader_imagee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/leader_images', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        if ($request->hasFile('leader_imagee')) {

            $leaderInfo->leader_image = $fileNamestoStore;
        }

        $leaderInfo->update();

        if ($leaderInfo) {
            return response()->json([
                'message' => 'Successifully leader info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update videos status only
    public function updatevideostatus(Request $request)
    {

        $videoInfo = Video::findOrFail($request->videoid);
        $videoInfo->status = $request->status;
        $videoInfo->save();
        if ($videoInfo) {
            return response()->json([
                'message' => 'Status updated successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update Video info from db.
    public function updatevideo(Request $request)
    {

        $videoInfo = Video::findOrFail($request->videoId);
        $videoInfo->tittle = $request->input('tittlee');
        $videoInfo->link = $request->input('linkk');
        $videoInfo->status = $request->input('status');

        $videoInfo->update();
        if ($videoInfo) {
            return response()->json([
                'message' => 'Successifully video info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function for updating department service status only.
    public function updatedepartmentservicestatus(Request $request)
    {
        $departmentInfo = DepartmentService::findOrFail($request->dptserviceId);
        $departmentInfo->status = $request->status;
        $departmentInfo->save();
        if ($departmentInfo) {
            return response()->json([
                'message' => 'Status Updated Successfully',
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
            ]);
        }
    }

    //Function for Updating Deaprtment services.
    public function updatedepartmentservice(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'departmentNamee' => ['required', 'string', 'max:255'],
            'servicee' => ['required', 'string', 'max:500'],
            'status' => 'required',
        ], [
            'departmentNamee.required' => 'Please enter department name before submiting.',
            'departmentNamee.max' => 'Department name must not exceed 255 words.',
            'servicee.max' => 'Service must not exceed 500 words.',
            'servicee.required' => 'Please enter service before submiting',
            'status' => 'status required',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $departmentInfo = DepartmentService::findOrFail($request->dptmntId);
        $departmentInfo->departmentName = $request->input('departmentNamee');
        $departmentInfo->service = $request->input('servicee');
        $departmentInfo->status = $request->input('status');

        $departmentInfo->update();
        if ($departmentInfo) {
            return response()->json([
                'message' => 'Successfull Department Service Info Updated',
                'code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ],500);
        }
    }

    //Function for updating upload document status only
    public function updatedocumentstatus(Request $request)
    {

        $docsInfo = UploadedDocs::findOrFail($request->docsId);
        $docsInfo->status = $request->status;
        $docsInfo->save();
        if ($docsInfo) {
            return response()->json([
                'message' => 'Status Updated Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function for Updating uplpoad documents
    public function updatedocument(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'fileNamee' => ['required', 'string', 'max:255'],
            'departmentNamee' => 'required',
            'documentt' => 'nullable|mimes:pdf|max:5120', // Only allow webp files
        ], [
            'documentt.mimes' => 'Invalid file format! Only pdf file are allowed.',
            'documentt.required' => 'Please upload file before submitting.',
            'documentt.max' => 'file size must not exceed 5MB.',
            'fileNamee.max' => 'File name must not exceed 255 word',
            'departmentNamee.required' => 'department required',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $docsInfo = UploadedDocs::findOrFail($request->docId);
        $docsInfo->fileName = $request->input('fileNamee');
        $docsInfo->departmentName = $request->input('departmentNamee');
        $docsInfo->status = $request->input('status');

        if ($request->hasFile('documentt')) {
            $destination_path = 'storage/uploads/document_files/' . $docsInfo->document;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('documentt');
            //Get filename with extension
            $filenameWithExt = $request->file('documentt')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/document_files', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noFile.pdf';
        }

        if ($request->hasFile('documentt')) {

            $docsInfo->document = $fileNamestoStore;
        }

        $docsInfo->update();

        if ($docsInfo) {
            return response()->json([
                'message' => 'Successifully document info Updated',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ]);
        }
    }

    //Fuction for updating picture status only.
    public function updatepicturestatus(Request $request)
    {

        $pictureInfo = PictureCollection::findOrFail($request->picId);
        $pictureInfo->status = $request->status;
        $pictureInfo->save();
        if ($pictureInfo) {
            return response()->json([
                'message' => 'Status Updated Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500
            ]);
        }
    }

    //Function to update picture for about us page
    public function updatepicture(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'pictureNamee' => ['required', 'string', 'max:255'],
            'positionn' => 'required',
            'picturee' => 'nullable|mimes:webp|max:5120', // Only allow webp files
        ], [
            'picturee.mimes' => 'Invalid image format! Only WEBP images are allowed.',
            'picturee.required' => 'Please upload an image before submitting.',
            'picturee.max' => 'Image size must not exceed 5MB.',
            'pictureNamee.max' => 'Name must not exceed 255 word',
            'positionn.required' => 'Fill postion required',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $pictureInfo = PictureCollection::findOrFail($request->pictureId);
        $pictureInfo->pictureName = $request->input('pictureNamee');
        $pictureInfo->position = $request->input('positionn');
        $pictureInfo->status = $request->input('status');

        if ($request->hasFile('picturee')) {
            $destination_path = 'storage/uploads/aboutpictures/' . $pictureInfo->picture;
            if (File::exists($destination_path)) {
                File::delete($destination_path);
            }
            //$request =request(); 
            $file = $request->file('picturee');
            //Get filename with extension
            $filenameWithExt = $request->file('picturee')->hashName();
            //Get file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //File Extension
            $extension = $file->extension();

            $fileNamestoStore = $filename . '_' . time() . '.' . $extension;
            $file->move('storage/uploads/aboutpictures', $fileNamestoStore);
        } else {
            $fileNamestoStore = 'noImage.webp';
        }

        if ($request->hasFile('picturee')) {

            $pictureInfo->picture = $fileNamestoStore;
        }

        $pictureInfo->update();

        if ($pictureInfo) {
            return response()->json([
                'message' => 'Successifully picture info Updated',
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
