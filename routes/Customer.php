<?php

use App\Models\Media;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin_Controller\HomeController;
use App\Http\Controllers\Admin_Controller\EnquireController;

// User Page
Route::get('/', action: function () {
    $homeMedia = Media::where('section','home')->get();
    return view('Customer-Dashboard.pages.index',compact('homeMedia'));
})->name('home');
Route::post('/contact_mail', [HomeController::class,'contact_mail'])->name('contact_mail');

Route::get('/about', action: function () {
    $aboutMedia = Media::where('section','about')->get();
    $contents =  Content::where('key', 'like', 'about_school_%')->get();
    return view('Customer-Dashboard.pages.about.index',compact('aboutMedia','contents'));
})->name('about');

Route::get('/programs', action: function () {
    return view('Customer-Dashboard.pages.programs.index');
})->name('programs');

Route::get('/faq', action: function () {
    $faqsMedia = Media::where('section','faqs')->first();
    $faqs = Content::where('section','faqs')->get();
    return view('Customer-Dashboard.pages.faq.index', compact('faqsMedia','faqs'));
})->name('faq');

Route::get('/gallery', action: function () {
    $galleryWelcome = Media::where('title','gallery_welcome')->first();
    $campusLife = Media::whereRaw('LOWER(title) like ?', ['%campus_life_%'])->get();
    $activities = Media::whereRaw('LOWER(title) like ?', ['%activity%'])->get();
    return view('Customer-Dashboard.pages.gallery.index',compact('galleryWelcome','campusLife','activities'));
})->name('gallery');

Route::get('/enquire-now', action: function () {
    $enquireMedia = Media::where('section','enquire')->get();
    return view('Customer-Dashboard.pages.enquireNow.index',compact('enquireMedia'));
})->name('enquire');
Route::post('/enquire-mail', [EnquireController::class,'enquireMail'])->name('enquire_mail');

Route::post('/change-language', function (Request $request) {

    session()->put('lang', $request->language);
    return response()->json(['success' => true]);
});
