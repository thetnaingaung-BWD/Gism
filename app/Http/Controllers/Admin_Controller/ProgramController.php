<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        return view('Admin-Dashboard.Edit-page.pages.programs.index');
    }
}
