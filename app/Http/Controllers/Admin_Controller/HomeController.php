<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\Mail;
use App\Models\Media;
use App\Models\Content;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    use Loggable;
    public function index() {
        session()->put('lang','en');
        $translations = Content::select('key')->where('section','home')->get();

        $homeMedia = Media::where('section','home')->get();
        // dd(isset($homeMedia[0]));
        return view('Admin-Dashboard.Edit-page.pages.home',compact('translations','homeMedia'));
    }
    public function contact_mail(Request $request) {
        $validator = $request->validate([
            'name' => 'required|max:120',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'subject' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'subject' => $request->subject,
            'remark' => $request->remark,
            'mail_type' => "Contact-Form"
        ];
        $request->country_code == '+95' ? $data['MM_ph'] = $request->phone : $data['TH_ph'] = $request->phone;

        Mail::create($data);
        Alert::success('Contact Form', 'Sent Successfully');
        return back();
    }
    public function editHomeWelcome(Request $request) {
        $content =[

            'school_name' => $request->school_name,

            'about_school'=> $request->about_school

        ];

        $request->session()->put('welcome-content', $content);

        $media = [];

        $newImageName = $this->uploadImage($request, 'welcome_bg_img','tmp/home/');
        if ($newImageName) {

            $media['welcome_bg_img'] = $newImageName;

        }

        if ($request->hasFile('welcome_bg_img')) {

            $request->session()->put('welcome-media', $media);

        }

        return back();
    }
    public function editPresidentSpeech(Request $request) {
        $content =[

            'president_name' => $request->president_name,

            'about' => $request->about,
        ];

        $request->session()->put('president-content', $content);

        $media = [];

        $newImageName = $this->uploadImage($request, 'president_photo','tmp/home/');

        if ($newImageName) {

            $media['president_photo'] = $newImageName;
        }

        if ($request->hasFile('president_photo')) {

        $request->session()->put('president-media', $media);

        }
        return back();
    }
    public function editVisionAndMission(Request $request) {
        $content =[
            'vision_context' => $request->vision_context,

            'mission_context' => $request->mission_context,

        ];

        $request->session()->put('vision-mission-content', $content);
        $media = [];

        $newImageName = $this->uploadImage($request, 'vision_mission_bg','tmp/home');

        if ($newImageName) {

            $media['vision_mission_bg'] = $newImageName;
        }

        if ($request->hasFile('vision_mission_bg')) {

            $request->session()->put('vision-mission-media', $media);

        }
        return back();
    }
    public function editContactInfo(Request $request) {
        $content =[

            'campus_address' => $request->campus_address,

            'phone_myanmar' => $request->phone_myanmar,

            'phone_thailand' => $request->phone_thailand,

        ];

        $request->session()->put('contact-info', $content);

        return back();
    }
    public function SaveBtn() {

        $sessionData = $this->getSessionData();

        $this->SaveAndStore($sessionData,'home');

        return back();
    }
    public function resetBtn() {
        
        $sessionData = $this->getSessionData();

        $this->resetAndDelete($sessionData,'tmp/home');

        return back();
    }
    private function getSessionData() {
            $homeContent = [];
            $homeContent['welcome-content'] = session('welcome-content');
            $homeContent['president-content'] = session('president-content');
            $homeContent['vision-mission-content'] = session('vision-mission-content');
            $homeContent['contact-info'] = session('contact-info');
            $homeMedia = [];
            $homeMedia['welcome-media'] = session('welcome-media');
            $homeMedia['president-media'] = session('president-media');
            $homeMedia['vision-mission-media'] = session('vision-mission-media');
            return [
                'homeContent' => $homeContent,
                'homeMedia' => $homeMedia,
            ];
    }




}
