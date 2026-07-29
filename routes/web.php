<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AnouncementController;
use App\Http\Controllers\Admin\DepartmentServiceConrtoller;
use App\Http\Controllers\Admin\DocumentUploadController;
use App\Http\Controllers\Admin\GeneralUpdateController;
use App\Http\Controllers\Admin\LeadershipController;
use App\Http\Controllers\Admin\MinisterController;
use App\Http\Controllers\Admin\PictureCollectionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('about_home');
Route::get('/', [PagesController::class, 'homePage'])->name('/');
Route::get('kuhusu-sisi', [PagesController::class, 'aboutUs'])->name('about_Us');
Route::get('habari-matukio', [PagesController::class, 'newsevents'])->name('events');
Route::get('wasiliana-nasi', [PagesController::class, 'contactUs'])->name('contact_Us');
Route::get('maktaba-ya-video', [PagesController::class, 'videoLibrary'])->name('video_Lebo');
Route::get('maktaba-ya-picha', [PagesController::class, 'photoLibrary'])->name('photo_Lebo');
Route::get('soma-zaidi/{id}', [PagesController::class, 'readmorepost'])->name('read_more');
Route::get('kuhusu-sisi-zaidi', [PagesController::class, 'readmoreabout'])->name('read_more_about');
Route::get('uongozi', [PagesController::class, 'leadership'])->name('our_leadership');
Route::get('idara/{departmentName}', [PagesController::class, 'utumishidepartment'])->name('utumishi_department');
// Route::get('idara', [PagesController::class, 'readmoreservice'])->name('read_more_service');
Route::get('documents/{departmentName}', [PagesController::class, 'showdepartmentdocx'])->name('show_document');
Route::post('mawasiliano', [PagesController::class, 'sendmessage'])->name('send_message');
Route::get('sendmail', [PagesController::class, 'sendmail']);

Auth::routes();

Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-dashboard');

//Middleware Implimentation
Route::middleware(['auth'])->group(function() {

    //Route::get('verifyEmailFirst', [RegisterController::class, 'verifyMailFirst'])->name('verifyEmailFirst');
    //Route::get('verify/{email}/{verifyToken}', [RegisterController::class, 'sendEmailDone'])->name('sendMailDone');
    Route::get('users', [HomeController::class, 'viewusers'])->name('user_view');
    Route::get('user-profile/{id}', [HomeController::class, 'showuser'])->name('show_user');
    Route::get('edit-user', [HomeController::class, 'edituser'])->name('user_edit');
    Route::post('update-user', [HomeController::class, 'updateuser'])->name('user_update');
    Route::post('user-status', [HomeController::class, 'updateuserstatus'])->name('update_user_status'); //For user status only using toggle button
    Route::get('change-password', [ChangePasswordController::class, 'passwordform'])->name('changepswd_update');
    Route::post('password-change', [ChangePasswordController::class, 'updatepassword'])->name('update_password');

    //Routes for Slides
    Route::resource('image-slide', SlideController::class);
    Route::post('slide-status', [GeneralUpdateController::class, 'updateslidestatus'])->name('update_slide_status');
    Route::post('slide-image', [GeneralUpdateController::class, 'updateslide'])->name('update_slide');

    //Routes for Posts 
    Route::resource('admin-post', PostController::class);
    Route::post('post-status', [GeneralUpdateController::class, 'updatepoststatus'])->name('update_post_status');
    Route::post('post-upadte', [GeneralUpdateController::class, 'updatepost'])->name('update_post');

    //Route for Special Anouncement
    Route::resource('admin-anouncement', AnouncementController::class);
    Route::post('anouncement-status', [GeneralUpdateController::class, 'updateanouncementstatus'])->name('update_anouncement_status');
    Route::post('anouncement-update', [GeneralUpdateController::class, 'updateanounce'])->name('update_anouncement');

    //Route for Minister Description
    Route::resource('minister-description', MinisterController::class);
    Route::post('minister-status', [GeneralUpdateController::class, 'updateministerstatus'])->name('update_minister_status');
    Route::post('minister-update', [GeneralUpdateController::class, 'updateministerdescription'])->name('update_minister_description');

    //Route for About us info
    Route::resource('about-us', AboutUsController::class);
    Route::post('aboutus-status', [GeneralUpdateController::class, 'updateaboutstatus'])->name('update_about_staus');
    Route::post('about-us-update', [GeneralUpdateController::class, 'updateboutus'])->name('update_about_us');

    //Route for Leadership info
    Route::resource('manage-leader', LeadershipController::class);
    Route::post('leader-status', [GeneralUpdateController::class, 'updateleaderstatus'])->name('update_leader_status');
    Route::post('leader-update', [GeneralUpdateController::class, 'updateleader'])->name('update_leader');

    //Route fof Video Library
    Route::resource('manage-video', VideoController::class);
    Route::post('video-status', [GeneralUpdateController::class, 'updatevideostatus'])->name('update_video_status');
    Route::post('video-update', [GeneralUpdateController::class, 'updatevideo'])->name('update_video');

    //Route for department service
    Route::resource('manage-department', DepartmentServiceConrtoller::class);
    Route::post('department-status', [GeneralUpdateController::class, 'updatedepartmentservicestatus'])->name('update_service_status');
    Route::post('department-update', [GeneralUpdateController::class, 'updatedepartmentservice'])->name('update_department_service');

    //Route for Uploading documents
    Route::resource('manage-document', DocumentUploadController::class);
    Route::post('document-status', [GeneralUpdateController::class, 'updatedocumentstatus'])->name('update_document_status');
    Route::post('document-update', [GeneralUpdateController::class, 'updatedocument'])->name('update_decument');

    //Route for uploading picture in the for about us page.
    Route::resource('manage-picture', PictureCollectionController::class);
    Route::post('manage-picture-status', [GeneralUpdateController::class, 'updatepicturestatus'])->name('update_photo_status');
    Route::post('manage-picture-update', [GeneralUpdateController::class, 'updatepicture'])->name('update_photo');
});

// Route::fallback(function(){

//     return view('404');
// });


// Route::get('/storage-link', function(){
//     $storagFolder = storage_path('app/public');
//     $linkFolder = $_SERVER['DOCUMENT_ROOT']. '/storage';
//     symlink($storagFolder, $linkFolder);
// });
