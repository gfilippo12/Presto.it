<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Mail\ContactSeller;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('management.index', compact('announcements'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('management.create', compact('categories'));
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $announcement = new Announcement();

        $announcement->user_id = auth()->user()->id;
        $announcement->title = $request->title;
        $announcement->body = $request->body;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $filename = uniqid('img_');

            $imagePath = $request->image->storeAs('public/images', $filename . '.' . $request->image->extension());

            $announcement->image = $imagePath;
        }
        $announcement->save();

        $announcement->categories()->attach($request->categories);

        return redirect()->route('management.index')->with(['success' => 'Annuncio creato con successo']);
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        if($announcement->user_id !== auth()->user()->id){
            abort(403);
        }

        $categories = Category::all();

        return view('announcement.edit', compact('announcement', 'categories'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        if($announcement->user_id !== auth()->user()->id)
        {
            abort(403);
        }

        $announcement->fill($request->all())->save;
        $announcement->categories()->detach();
        $announcement->categories()->attach($request->categories);

        return redirect()->route('management.index')->with(['success' => 'Annuncio modificato con successo']);
    }

    public function destroy(Announcement $announcement)
    {
        if($announcement->user_id !== auth()->user()->id)
        {
            abort(403);
        }

        $announcement->delete();

        return redirect()->route('management.index')->with(['success' => 'Annuncio cancellato con successo']);
    }
    public function contact(Announcement $announcement) {
        $data = [
            'titolo'=>$announcement->title,
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
        ];
        Mail::to($announcement->user->email)->send( new ContactSeller($data));
        return redirect()->back()->with('message', 'La tua email ?? stata inviata con successo al venditore!');

    }
}


