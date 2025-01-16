<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function contact() {
        $contactMail = Mail::where('mail_type','Contact-Form')->paginate(5);
        return view('Admin-Dashboard.contact-list',compact('contactMail'));
    }
     public function enquireForm() {
        $enquireMail = Mail::where('mail_type','Enquire-Form')->paginate(5);
        // dd($enquireMail->toArray());
        return view('Admin-Dashboard.enquire-list',compact('enquireMail'));
    }
    public function viewMore($id) {
        $mailDetail = Mail::where('id',$id)->first();
        return view('Admin-Dashboard.enquire-view-more',compact('mailDetail'));

    }
    public function delete($id) {
        Mail::where('id',$id)->delete();
        Alert::warning('Enquire Form', 'Delete Successfully');
        return back();
    }
}
