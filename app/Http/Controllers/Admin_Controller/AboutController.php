<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\Media;
use App\Models\Content;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin_Controller\HomeController;

class AboutController extends Controller
{
    use Loggable;
    public function index() {
        $contents =  Content::where('section','about')->get()->skip(1);
        $aboutMedia = Media::where('section','about')->get();
        return view('Admin-Dashboard.Edit-page.pages.about.index',compact('contents','aboutMedia'));
    }
    public function editAbout(Request $request) {
        $media = [];

        $newImageName = $this->uploadImage($request, 'about_bg_img','tmp/about');

        if ($newImageName) {

            $media['about_bg_img'] = $newImageName;
        }

        // Store data to the
        if ($request->hasFile('about_bg_img')) {

            $request->session()->put('about-welcome-media', $media);

        }

        return back();
    }
    public function editHistory(Request $request) {
        $content =[

            'our_history_content' => $request->our_history_content,

        ];

        $request->session()->put('our-history-content', $content);

        $media = [];

        $newImageName = $this->uploadImage($request, 'our_history_img','tmp/about');

        if ($newImageName) {

            $media['our_history_img'] = $newImageName;
        }

        if ($request->hasFile('our_history_img')) {

            $request->session()->put('about-our-history-media', $media);

        }
        return back();
    }
    public function editAboutSchool(Request $request) {
        $content = $request->except('_token') ;


        $existingData = session('about-school-list', []);


        $updatedData = array_merge($existingData, $content);

        session(['about-school-list' => $updatedData]);

        return back();
    }
    public function deleteFromDatabase($id){
        Content::where('id',$id)->delete();
        return back();
    }
    public function deleteFromSession($id)
    {
        // Forget specific session data
        session()->forget('about-school-list.'.$id);

        return back();
    }

    public function resetBtn() {

        $sessionData = $this->getSessionData();

        $this->resetAndDelete($sessionData,'tmp/about');

        return back();
    }
    public function SaveBtn() {
        $sessionData = $this->getSessionData();

        $this->SaveAndStore($sessionData,'about');

        return back();
    }
    private function getSessionData() {

            $homeContent = [];
            $homeContent['our-history-content'] = session('our-history-content');
            $homeContent['president-content'] = session('president-content');
            $homeContent['about-school-list'] = session('about-school-list');
            // foreach (session('about-school-list') as $key => $item) {
            //     $homeContent[$key] = $item;
            // }

            $homeMedia = [];
            $homeMedia['about-welcome-media'] = session('about-welcome-media');
            $homeMedia['about-our-history-media'] = session('about-our-history-media');
            return [
                'homeContent' => $homeContent,
                'homeMedia' => $homeMedia,
            ];
    }
}
