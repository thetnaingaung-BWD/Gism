<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\Media;
use App\Models\Content;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FaqController extends Controller
{
    use Loggable;
    public function index() {
        $faqs = Content::where('section','faqs')->get();

        $faqsMedia = Media::where('section','faqs')->first();
        
        return view('Admin-Dashboard.Edit-page.pages.faq.index',compact('faqs','faqsMedia'));
    }
    public function editFaqsWelcome(Request $request) {
        $media = [];

        $newImageName = $this->uploadImage($request, 'faqs_bg_img','tmp/faqs');

        if ($newImageName) {

            $media['faqs_bg_img'] = $newImageName;
        }

        // Store data to the
        if ($request->hasFile('faqs_bg_img')) {

            $request->session()->put('faqs-welcome-media', $media);

        }

        return back();
    }
    public function editFaqsContent(Request $request) {

        $data = $request->except('_token');

        $formKey = 'faqs-content-' . $request->input('section_id', uniqid());

        $request->session()->put($formKey, $data);

        return back();
    }

    public function resetBtn() {
        dd(session()->all());
        $sessionData = $this->getSessionData();

        $this->resetAndDelete($sessionData,'tmp/faq');

        return back();
    }
    public function SaveBtn() {
        $sessionData = $this->getSessionData();

        $this->SaveAndStore($sessionData,'faqs');

        return back();
    }
     private function getSessionData() {

            $section_1 = Arr::except(session('faqs-content-1', []), ['section_id']);
            $section_2 = Arr::except(session('faqs-content-2', []), ['section_id']);
            $section_3 = Arr::except(session('faqs-content-3', []), ['section_id']);
            $section_4 = Arr::except(session('faqs-content-4', []), ['section_id']);

            $homeContent = [];
            $homeContent['faqs-content-1'] = $section_1;
            $homeContent['faqs-content-2'] = $section_2;
            $homeContent['faqs-content-3'] = $section_3;
            $homeContent['faqs-content-4'] = $section_4;


            $homeMedia = [];
            $homeMedia['faqs-welcome-media'] = session('faqs-welcome-media');
            return [
                'homeContent' => $homeContent,
                'homeMedia' => $homeMedia,
            ];
    }
}
