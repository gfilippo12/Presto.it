<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

// * Inizio revisore

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, annuncio accettato');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, annuncio rifiutato');

    }

    public function becomeRevisor() //* ok
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect('/')->back()->with('message', 'Complimenti! hai chiesto di diventare revisore in maniera corretta');
    }

    public function makeRevisor(User $user) //* da vedere
    {
        Artisan::call('presto:makeUserRevisor' , ["email"=>$user->email]);
        return redirect ('/')->with('message', 'Complimenti! l\'utente è diventato revisore');
    }
}

// * Fine revisore 

