<?php
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');

Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class, 'showAnnouncement'])->middleware('auth')->name('announcements.show');
Route::get('/tutti/annunci',[AnnouncementController::class, 'indexAnnouncement'])->middleware('auth')->name('announcements.index');


//* Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');

//* Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

//* Rifiuta Annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');