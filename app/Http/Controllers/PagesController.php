<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use App\Models\Video;
use App\Mail\SendMail;
use App\Models\AboutUs;
use App\Models\Visitor;
use App\Models\Leadership;
use App\Models\Anouncement;
use App\Models\MessageInfo;
use App\Models\UploadedDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MinisterComment;
use App\Models\DepartmentService;
use App\Models\PictureCollection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class PagesController extends Controller
{
    public function homePage(Request $request)
    {
        $q = $request->input('q');
        $postInfos = Post::where('post_status', 1)->when($request->has('q') && $q, function (Builder $query) use ($q) {
            $query->where('post_tittle', 'like', "%$q%")
                ->orWhere('post_description', 'like', "%$q%");
        })
            ->orderBy('id', 'desc')
            ->paginate(4);

        $postInfos1 = Post::where('post_status', 1)->orderBy('created_at', 'desc')
        ->when($request->has('q') && $q, function (Builder $query) use ($q) {
            $query->where('post_tittle', 'like', "%$q%")
                ->orWhere('post_description', 'like', "%$q%");
        })
        ->limit(1)->get();

        $slideInfos = Slide::where('status', 1)->orderBy('id', 'desc')->get();
        $anouncementInfos = Anouncement::where('status', 1)->orderBy('id', 'desc')->get();
        $ministerInfos = MinisterComment::where('status', 1)->get();
        $videoInfos1 = Video::where('status', 1)->orderBy('id', 'desc')->paginate(2);
        $departmentInfos = DepartmentService::where('status', 1)->orderBy('id', 'desc')->get();

        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        // Total visitors
        $totalVisitors = Visitor::count();

        // Today's visitors
        $todayVisitors = Visitor::whereDate('created_at', $today)->count();

        // Weekly visitors
        $weeklyVisitors = Visitor::whereBetween('created_at', [$weekStart, $weekEnd])->count();

        //Monthly Visitors
        $monthlyVisitors = Visitor::whereBetween('created_at', [$monthStart, $monthEnd])->count(); 

        return view('index', compact(['slideInfos', 'postInfos', 'postInfos1', 'anouncementInfos', 'ministerInfos', 'videoInfos1', 'departmentInfos','totalVisitors','todayVisitors', 'weeklyVisitors', 'monthlyVisitors']));
    }

    public function aboutUs()
    {
        $aboutusInfos = AboutUs::where('status', 1)->get();
        $leaderInfos = Leadership::where('status', 1)->get();
        $departmentInfos = DepartmentService::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        $departmentInform = DepartmentService::where('status', 1)->get();
        $pictureInfos = PictureCollection::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.about', compact(['aboutusInfos', 'leaderInfos', 'departmentInfos', 'departmentInform', 'pictureInfos']));
    }

    public function newsevents()
    {
        
        $postInfos = Post::where('post_status', 1)->orderBy('id', 'desc')->paginate(4);
        $videoInfos1 = Video::where('status', 1)->orderBy('id', 'desc')->paginate(2);
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $leaderInfos = Leadership::where('status', 1)->get();
        return view('pages.newsevent', compact(['postInfos', 'videoInfos1', 'departmentInfos', 'leaderInfos']));
    }

    public function contactUs()
    {
        $departmentInfos = DepartmentService::where('status', 1)->get();
        return view('pages.contact', compact(['departmentInfos']));
    }

    public function videoLibrary()
    {
        $videoInfos = Video::where('status', 1)->orderBy('id', 'desc')->paginate(4);
        $videoInfos1 = Video::where('status', 1)->orderBy('id', 'desc')->paginate(1);
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $leaderInfos = Leadership::where('status', 1)->get();
        return view('pages.videolibrary', compact(['videoInfos', 'videoInfos1', 'departmentInfos', 'leaderInfos']));
    }

    public function photoLibrary()
    {
        $slideInfos = Slide::where('status', 1)->orderBy('id', 'desc')->get();
        $postInfos1 = Post::where('post_status', 1)->orderBy('id', 'desc')->get();
        $postInfos = Post::where('post_status', 1)->orderBy('id', 'desc')->paginate(4);
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $leaderInfos = Leadership::where('status', 1)->get();
        return view('pages.photolibrary', compact(['slideInfos', 'postInfos1', 'postInfos', 'departmentInfos', 'leaderInfos']));
    }

    public function readmorepost($id)
    {
        $postInfos = Post::where('post_status', 1)->orderBy('id', 'desc')->paginate(4);
        Post::find($id)->increment('view_count');
        $postInfo = Post::find($id);
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $videoInfos1 = Video::orderBy('id', 'desc')->paginate(2);
        return view('readmore', compact(['postInfos', 'postInfo', 'departmentInfos', 'videoInfos1']));
    }

    public function readmoreabout()
    {
        $aboutusInfos = AboutUs::where('status', 1)->get();
        $departmentInfos = DepartmentService::where('status', 1)->orderBy('id', 'asc')->get();
        $pictureInfos = PictureCollection::where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $leaderInfos = Leadership::where('status', 1)->get();
        return view('pages.readmoreabout', compact(['aboutusInfos', 'departmentInfos', 'pictureInfos', 'leaderInfos']));
    }

    public function leadership()
    {
        $leaderInfos = Leadership::where('status', 1)->get();
        $departmentInfos = DepartmentService::where('status', 1)->get();
        return view('pages.leadership', compact(['leaderInfos', 'departmentInfos']));
    }

    public function utumishidepartment($departmentName)
    {
        // $postInfos = Post::where('post_status', 1)->get();
        $postInfos = Post::where('post_status', 1)->orderBy('id', 'desc')->paginate(3);
        $anouncementInfos = Anouncement::where('status', 1)->orderBy('id', 'desc')->get();
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $depInfos = DepartmentService::where('departmentName', $departmentName)->where('status', 1)->paginate(10);
        $docInfos = UploadedDocs::where('departmentName', $departmentName)->where('status', 1)->get();
        $departmentInfo = DepartmentService::orWhere('departmentName', $departmentName)->first();
        return view('pages.serviceinfo', compact(['postInfos', 'anouncementInfos', 'departmentInfos', 'depInfos', 'docInfos', 'departmentInfo']));
    }


    //Function to show the uploaded document of some department
    public function showdepartmentdocx($departmentName)
    {
        //$postInfos = Post::where('post_status', 1)->get();
        $postInfos = Post::where('post_status', 1)->orderBy('id', 'desc')->paginate(3);
        $anouncementInfos = Anouncement::where('status', 1)->orderBy('id', 'desc')->get();
        $departmentInfos = DepartmentService::where('status', 1)->get();
        $uplodedDocx =  UploadedDocs::where('departmentName', $departmentName)->where('status', 1)->get();
        $departmentInfo = DepartmentService::orWhere('departmentName', $departmentName)->first();
        return view('pages.docinfo', compact(['postInfos', 'postInfos', 'anouncementInfos', 'departmentInfos', 'uplodedDocx', 'departmentInfo']));
    }

    //Function to send message 
    public function sendmessage(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'infoMessage' => 'required',

        ]);

        $input = $request->all();

        MessageInfo::create($input);

        //Send mail to admin
        if ($this->isOnline()) {
            $mail_data = [
                'fullName' => $request->fullName,
                'email' => $request->email,
                'subject' => $request->subject,
                'infoMessage' => $request->infoMessage,
                'mailto' => 'info@tamisemim.go.tz',
            ];

            Mail::send('sendmail', $mail_data, function ($msg) use ($mail_data) {
                $msg->to($mail_data['mailto']);
                $msg->from($mail_data['email']);
                $msg->subject($mail_data['subject']);
            });

            return redirect()->back()->with(['status' => 'Your message has been sent. Thank you!']);
        } else {

            return redirect()->back()->with(['status' => 'Not connected with internet']);
        }
    }

    public function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, 'r')) {
            return true;
        } else {
            return false;
        }
    }
}
