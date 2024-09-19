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

        $projects = Project::with('company')
        ->isFeatured(true)
        ->isApproved(true)
        ->get(); // Fetch all projects with company data

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
    public function filtersprojects(Request $request)
    {
        $pageTitle = 'Filters Projects';

        // Retrieve input parameters
        $beds = $request->input('beds', []);
        $types = $request->input('types', []); // Example for additional filters like property type
        $priceRange = $request->input('priceRange', []); // Example for price range

        // Start building the query
        $query = Project::with('company', 'citites', 'areas', 'elevationPictures', 'unitConfigurations')
                        ->isApproved(true);

        // Apply filters dynamically based on provided input parameters

        // Filter by beds
        if (is_array($beds) && !empty($beds)) {
            $query->whereHas('unitConfigurations', function ($q) use ($beds) {
                $q->whereIn('beds', $beds);
            });
        }

        // Filter by project type
        if (is_array($types) && !empty($types)) {
            $query->whereIn('project_type', $types);
        }

        // Filter by price range
        if (is_array($priceRange) && count($priceRange) === 2) {
            $minPrice = $priceRange[0];
            $maxPrice = $priceRange[1];
            $query->whereBetween('price_per_sft', [$minPrice, $maxPrice]);
        }

        // Execute the query and get results
        $projects = $query->get();

        // Debug the projects data (optional)
        // dd($projects);

        // Return the view with filtered projects
        return view('frontend.pages.filtersprojects', compact('pageTitle', 'projects'));
    }

}
