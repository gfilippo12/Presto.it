<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $announcement = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

}
