<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    use Loggable;
    public function index() {
        $galleryWelcome = Media::where('title','gallery_welcome')->first();
        $campusLife = Media::whereRaw('LOWER(title) like ?', ['%campus_life_%'])->get();
        $activities = Media::whereRaw('LOWER(title) like ?', ['%activity%'])->get();
        return view('Admin-Dashboard.Edit-page.pages.gallery.index',compact('galleryWelcome','campusLife','activities'));
    }
    public function editGalleryWelcome(Request $request) {
        $media = [];
        $newImageName = $this->uploadImage($request, 'gallery_welcome','tmp/gallery/');

        if ($newImageName) {

            $media['gallery_welcome'] = $newImageName;

        }
        if ($request->hasFile('gallery_welcome')) {

            $request->session()->put('gallery-welcome', $media);

        }
        return back();
    }
    public function editCampusLife(Request $request) {
        $media = [];
        foreach ($request->gallery_campus as $key => $item) {

            $newImageName = uniqid() . $item->getClientOriginalName();

            $item->storeAs('tmp/gallery/', $newImageName, 'public');

            $media['campus_life_'.$key+1] = $newImageName;

        }
        if ($request->hasFile('gallery_campus')) {

            $request->session()->put('gallery-campus', $media);

        }

        return back();
    }
    public function editActivity(Request $request) {

        $media = [];
        foreach ($request->gallery_activity as $key => $item) {

            $newImageName = uniqid() . $item->getClientOriginalName();

            $item->storeAs('tmp/gallery/', $newImageName, 'public');

            $media['activity_'.$key+1] = $newImageName;

        }
        if ($request->hasFile('gallery_activity')) {

            $request->session()->put('gallery-activity', $media);

        }

        return back();
    }
    public function deleteFromDatabase($id){
        Media::where('id',$id)->delete();
        return back();
    }
    public function deleteFromSession($id)
    {
        // Forget specific session data
        session()->forget('gallery-campus.'.$id);

        return back();
    }
    public function SaveBtn() {
        $sessionData = $this->getSessionData();

        $this->SaveAndStore($sessionData,'gallery');

        return back();
    }
    public function resetBtn() {
        
        $sessionData = $this->getSessionData();

        $this->resetAndDelete($sessionData,'tmp/gallery');

        return back();
    }

    private function getSessionData() {
            $homeMedia = [];
            $homeMedia['gallery-welcome'] = session('gallery-welcome');
            $homeMedia['gallery-campus'] = session('gallery-campus');
            $homeMedia['gallery-activity'] = session('gallery-activity');
            return ['homeMedia'=>$homeMedia,'homeContent' => null];
    }
}
