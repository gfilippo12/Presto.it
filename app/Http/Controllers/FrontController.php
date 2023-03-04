<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home() {
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');

        return view('home', compact('announcements'));
    }

    public function categoryShow(Category $category) 
    {
        return view('categoryShow', compact('category'));
    }


    

//* VEDERE  BECOME REVISOR  SU VIDEO 3 .... 20:35 REVISOR CONTROLLER (NEL VIDEO 10 LI METTE QUI DENTRO 4:15)!!

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

//* SETTAGGIO LINGUA 

    public function setLanguage($lang)
    {
        session()->put('locale',$lang);
        return redirect()->back();
    }

}
