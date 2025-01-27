<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\Mail;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin_Controller\HomeController;

class EnquireController extends Controller
{
    use Loggable;

    public function index() {
        $enquireMedia = Media::where('section','enquire')->get();
        return view('Admin-Dashboard.Edit-page.pages.enquireNow.index',compact('enquireMedia'));
    }
    public function enquireMail(Request $request){
        $this->ValidationProcess($request);
        $data=[
            'name' => $request->name  ,
            'email' => $request->email ,
            'MM_ph' => $request->MM_ph ,
            'TH_ph' => $request->TH_ph ,
            'HEC' => $request->HEC ,
            'CON' => $request->CON ,
            'program_id' => $request->program ,
            'mail_type' => "Enquire-Form"
        ];
        Mail::create($data);
        Alert::success('Enquire Form', 'Sent Successfully');
        return back();
    }
    public function editEnquireWelcome(Request $request) {

        $media = [];

        $newImageName = $this->uploadImage($request, 'enquire_bg_img','tmp/enquire');

        if ($newImageName) {

            $media['enquire_bg_img'] = $newImageName;
        }
        if ($request->hasFile('enquire_bg_img')) {

            $request->session()->put('enquire_welcome', $media);
        }
        return back();
    }
    public function editEnquireForm(Request $request) {
        $media = [];

        $newImageName = $this->uploadImage($request, 'enquire_form_img','tmp/enquire');

        if ($newImageName) {

            $media['enquire_form_img'] = $newImageName;
        }

        if ($request->hasFile('enquire_form_img')) {

            $request->session()->put('enquire_form', $media);
        }

        return back();
    }
    public function resetBtn(HomeController $homeController) {
        
        $sessionData = $this->getSessionData();

        $homeController->resetAndDelete($sessionData,'tmp/enquire');

        return back();
    }
    public function SaveBtn(HomeController $homeController) {
        $sessionData = $this->getSessionData();

        $this->SaveAndStore($sessionData,'enquire');

        return back();
    }

    private function ValidationProcess($request){
        $rules =[
            'name' => 'required|max:120',
            'email' => 'required|email',
            'MM_ph' => ['required_without:TH_ph','nullable','regex:/^(\+959|09)\d{7,9}$/'],
            'TH_ph' => ['required_without:MM_ph','nullable','regex:/^((0[689]\d{8})|(0[2-5]\d{7})|(\+66[689]\d{8})|(\+662\d{7}))$/'],
            'HEC' => 'required',
            'CON' => 'required',
            'program' => 'required',

        ];
        $message=[
            'MM_ph.regex' => "Myanmar Phone Number isn't correct",
            'TH_ph.regex' => "Thailand Phone Number isn't correct",
            'MM_ph.required_without' => 'Myanmar Phone Number field is required when Thailand Phone Number is not present.',
            'TH_ph.required_without' => 'Thailand Phone Number field is required when Myanmar Phone Number is not present.',
            'HEC.required' => 'Highest Education Completed field is required',
            'CON.required' => 'Country of Nationality field is required'
        ];
        $validator = $request->validate($rules,$message);

    }
    private function getSessionData() {
            $homeMedia = [];
            $homeMedia['enquire_welcome'] = session('enquire_welcome');
            $homeMedia['enquire_form'] = session('enquire_form');
            return ['homeMedia'=>$homeMedia,'homeContent' => null];
    }
}
