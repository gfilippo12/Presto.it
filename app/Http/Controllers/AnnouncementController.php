<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnuncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcements.create');
    }


}
