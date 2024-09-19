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
    $types = $request->input('types', []);
    $priceRange = $request->input('budgets', []);
    $areaNames = $request->input('areas', []);
    $projectName = $request->input('name', ''); // Filter for project name

    // Start building the query
    $query = Project::with('company', 'citites', 'areas', 'elevationPictures', 'unitConfigurations')
                    ->isApproved(true);

    // Apply filters dynamically based on provided input parameters

    // Filter by project name
    if (!empty($projectName)) {
        $query->where('name', 'LIKE', "%$projectName%");
    }

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

    // Filter by area names using a combined WHERE condition (case-insensitive)
    if (is_array($areaNames) && !empty($areaNames)) {
        $likeConditions = [];
        foreach ($areaNames as $name) {
            $likeConditions[] = 'LOWER(name) LIKE ?';
        }
        $query->whereHas('areas', function ($q) use ($areaNames, $likeConditions) {
            $q->whereRaw(implode(' OR ', $likeConditions), array_map(fn($name) => '%' . strtolower($name) . '%', $areaNames));
        });
    }

    // Execute the query and get results
    $projects = $query->get();

    // Check if all filters are empty
    if (empty($beds) && empty($types) && empty($priceRange) && empty($areaNames) && empty($projectName)) {
        $projects = collect(); // Return an empty collection if no filters are applied
    }

    // Return the view with filtered projects
    return view('frontend.pages.filtersprojects', compact('pageTitle', 'projects'));
}

}
