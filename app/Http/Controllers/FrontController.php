<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home() {
        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');

        return view('home', compact('announcements'));
    }
}
