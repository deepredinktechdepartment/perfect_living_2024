<?php

// app/Http/Controllers/PagesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function termsOfUse()
    {
        $pageTitle = 'Terms of Use';
        return view('frontend.pages.under_construction', compact('pageTitle'));
    }

    public function advertiseWithUs()
    {
        $pageTitle='Advertise with Us';
        return view('frontend.pages.under_construction',compact('pageTitle'));
    }
    public function homepage()
    {
        $pageTitle='Home page';
        return view('frontend.pages.under_construction',compact('pageTitle'));
    }
}
