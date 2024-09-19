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
        ->orderBy('updated_at', 'desc')
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

        // Retrieve input parameters as comma-separated strings
        $beds = $request->input('beds', ''); // Comma-separated string for beds
        $types = $request->input('property_type', ''); // Comma-separated string for types
        $priceRange = $request->input('budgets', ''); // Comma-separated string for budgets
        $areaNames = $request->input('areas', ''); // Comma-separated string for areas
        $projectName = $request->input('name', ''); // Get project name for filtering
        $builders = $request->input('builders', ''); // Comma-separated string for builders
        $searchQuery = $request->query('search', ''); // Get the search input (default to empty)

        // Start building the query
        $query = Project::with('company', 'citites', 'areas', 'elevationPictures', 'unitConfigurations')
                        ->isApproved(true);

        // Filter by project name if provided
        if (!empty($projectName)) {
            $query->where('name', 'LIKE', "%$projectName%");
        }

        // Filter by beds if provided (comma-separated string)
        if (!empty($beds)) {
            $bedsArray = explode(',', $beds); // Convert the comma-separated string into an array
            $query->whereHas('unitConfigurations', function ($q) use ($bedsArray) {
                $q->whereIn('beds', $bedsArray);
            });
        }

        // Filter by project types if provided (comma-separated string)
        if (!empty($types)) {
            $typesArray = explode(',', $types); // Convert the comma-separated string into an array
            $query->whereIn('project_type', $typesArray);
        }

// Filter by price range if provided (comma-separated string)
if (!empty($priceRange)) {
    $priceRangeArray = explode(',', $priceRange); // Convert the comma-separated string into an array
    if (count($priceRangeArray) === 2) {
        $minPrice = $priceRangeArray[0];
        $maxPrice = $priceRangeArray[1];

        // Adjust query to filter based on price_range_start and price_range_end
        $query->where(function ($q) use ($minPrice, $maxPrice) {
            $q->whereBetween('price_range_start', [$minPrice, $maxPrice])
              ->orWhereBetween('price_range_end', [$minPrice, $maxPrice])
              ->orWhere(function ($q) use ($minPrice, $maxPrice) {
                  $q->where('price_range_start', '<=', $minPrice)
                    ->where('price_range_end', '>=', $maxPrice);
              });
        });
    }
}


        // Filter by area names (comma-separated string)
        if (!empty($areaNames)) {
            $areaNamesArray = explode(',', $areaNames); // Convert the comma-separated string into an array
            $query->whereHas('areas', function ($q) use ($areaNamesArray) {
                $q->where(function ($subQuery) use ($areaNamesArray) {
                    foreach ($areaNamesArray as $name) {
                        $subQuery->orWhere('name', 'LIKE', '%' . trim($name) . '%');
                    }
                });
            });
        }

        // Filter by builders using the company relation
        if (!empty($builders)) {
            $buildersArray = explode(',', $builders); // Convert the comma-separated string into an array
            $query->whereHas('company', function ($q) use ($buildersArray) {
                $q->whereIn('slug', $buildersArray); // Assuming 'name' column in the 'company' table
            });
        }

   // Filter by search query (name, area, unit configurations, or company name)
   if (!empty($searchQuery)) {
    $query->where(function ($q) use ($searchQuery) {
        $q->where('name', 'LIKE', "%$searchQuery%") // Search by project name
          ->orWhereHas('areas', function ($q) use ($searchQuery) { // Search by area name
              $q->where('name', 'LIKE', "%$searchQuery%");
          })
          ->orWhereHas('unitConfigurations', function ($q) use ($searchQuery) { // Search by unit configurations
              $q->where('beds', 'LIKE', "%$searchQuery%");
          })
          ->orWhereRaw('LOWER(project_type) LIKE ?', ["%$searchQuery%"]) // Search by project type
          ->orWhereHas('company', function ($q) use ($searchQuery) { // Search by company name
              $q->where('name', 'LIKE', "%$searchQuery%");
          });
    });
}



        // Execute the query and get results
        $projects = $query->orderBy('updated_at', 'desc')->get();

        // If all filters are empty, return an empty collection
        if (empty($beds) && empty($types) && empty($priceRange) && empty($areaNames) && empty($projectName) && empty($searchQuery) && empty($builders)) {
            $projects = collect(); // Return an empty collection if no filters are applied
        }

        // Return the view with filtered projects
        return view('frontend.pages.filtersprojects', compact('pageTitle', 'projects'));
    }



}
