<?php

// app/Http/Controllers/PagesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;

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

        $projects = Project::with('company')->isFeatured(true)->get(); // Fetch all projects with company data

        return view('frontend.pages.home',compact('pageTitle','projects'));
    }
    public function aboutUs()
    {
        $pageTitle='About Us';
        return view('frontend.pages.under_construction',compact('pageTitle'));
    }
    public function contactUs()
    {
        $pageTitle='Contact Us';
        return view('frontend.pages.under_construction',compact('pageTitle'));
    }
    public function fitlersprojects()
    {
        $pageTitle='fitlersprojects';
        return view('frontend.pages.fitlersprojects',compact('pageTitle'));
    }
}
