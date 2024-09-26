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

 $projects = Project::query()

    ->isFeatured(true) // Assuming scopeIsFeatured exists
    ->isApproved(true) // Assuming scopeIsApproved exists
    ->orderBy('updated_at', 'desc')
    ->get();


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


   public function newFiltersprojects(Request $request,$any = null)
{



    // Break the URL into segments
    $segments = explode('/', $any);

    // Initialize variables for each type of segment
    $builders = null;
    $collection = null;
    $topLocations = null;
    $budgets = null;
    $project = null;
    $apartments = null;
    $search = null;
    $propertytypes = null;

    // Iterate through the segments and extract values
    for ($i = 0; $i < count($segments); $i++) {
        switch ($segments[$i]) {
            case 'builders':
                $builders = $segments[$i + 1] ?? null;
                break;
            case 'collection':
                $collection = $segments[$i + 1] ?? null;
                break;
            case 'top-locations':
                $topLocations = $segments[$i + 1] ?? null;
                break;
            case 'budgets':
                $budgets = $segments[$i + 1] ?? null;
                break;
            case 'project':
                $project = $segments[$i + 1] ?? null;
                break;
            case 'apartments-in-hyderabad':
                $apartments = $segments[$i + 1] ?? null;
                break;
            case 'search':
                $search = $segments[$i + 1] ?? null;
                break;
            case 'property-type':
                $propertytypes = $segments[$i + 1] ?? null;
                break;
        }
    }







    // Retrieve input parameters as comma-separated strings
    // $beds = $request->input('beds', ''); // Comma-separated string for beds
    // $types = $request->input('property_type', ''); // Comma-separated string for types
    // $priceRange = $request->input('budgets', ''); // Comma-separated string for budgets
    // $areaNames = $request->input('areas', ''); // Comma-separated string for areas
    // $projectName = $request->input('name', ''); // Get project name for filtering
    // $builders = $request->input('builders', ''); // Comma-separated string for builders
    // $searchQuery = $request->query('search', ''); // Get the search input (default to empty)


    $beds = $apartments; // Comma-separated string for beds
    $types = $propertytypes; // Comma-separated string for types
    $priceRange = $budgets; // Comma-separated string for budgets
    $areaNames = $topLocations; // Comma-separated string for areas
    $projectName = $request->input('name', ''); // Get project name for filtering
    $builders = $builders; // Comma-separated string for builders
    $searchQuery = $search; // Get the search input (default to empty)
    $collection = $collection; // Get the search input (default to empty)


    $pageTitle = 'Apartments'; // Default title

    // Check if any of the filters have values and append to the title
    if (!empty($beds)) {
        $pageTitle .= ' with ' . $beds . ' beds';
    }

    if (!empty($types)) {
        $pageTitle .= ' in ' . $types;
    }

    if (!empty($priceRange)) {
        $pageTitle .= ' priced at ' . $priceRange;
    }

    if (!empty($areaNames)) {
        $pageTitle .= ' located in ' . $areaNames;
    }

    if (!empty($projectName)) {
        $pageTitle .= ' for project ' . $projectName;
    }

    if (!empty($builders)) {
        $pageTitle .= ' by ' . $builders;
    }
    if (!empty($collection)) {
        $pageTitle .= ' in ' . $collection;
    }

    if (!empty($searchQuery)) {
        $pageTitle .= ' matching search: ' . $searchQuery;
    }

    // Trim and format the final title if needed
    $pageTitle = trim(str_replace('-', ' ', $pageTitle));


    // Start building the query
    $query = Project::with(['citites', 'areas', 'elevationPictures', 'unitConfigurations'])
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

    // Filter by builders using the company_id JSON field
// Filter by builders using the company slug field
// Filter by builders using the company slug field
if (!empty($builders)) {
    $buildersArray = explode(',', $builders); // Convert the comma-separated string into an array

    // Fetch the company IDs corresponding to the passed slugs
    $companyIds = Company::whereIn('slug', $buildersArray)->pluck('id')->toArray();


    // If we have company IDs, filter projects by those company IDs (stored in the company_id JSON field)
    if (!empty($companyIds)) {
        $query->where(function ($q) use ($companyIds) {

            foreach ($companyIds as $companyId) {
                // Ensure company_id is not empty and matches exactly
                $q->orWhereRaw("JSON_CONTAINS(JSON_UNQUOTE(company_id), ?, '$') AND JSON_LENGTH(company_id) > 0", [json_encode((string)$companyId)]);
            }
        });
    }




}



    // Filter by search query (name, area, unit configurations, or project type)
    if (!empty($searchQuery)) {
        $query->where(function ($q) use ($searchQuery) {
            $q->where('name', 'LIKE', "%$searchQuery%") // Search by project name
              ->orWhereHas('areas', function ($q) use ($searchQuery) { // Search by area name
                  $q->where('name', 'LIKE', "%$searchQuery%");
              })
              ->orWhereHas('unitConfigurations', function ($q) use ($searchQuery) { // Search by unit configurations
                  $q->where('beds', 'LIKE', "%$searchQuery%");
              })
              ->orWhereRaw('LOWER(project_type) LIKE ?', ["%$searchQuery%"]); // Search by project type
        });
    }

    if (!empty($collection)) {
        $query->where(function ($q) use ($collection) {
            $q->where('name', 'LIKE', "%$collection%") // Search by project name
              ->orWhereHas('areas', function ($q) use ($collection) { // Search by area name
                  $q->where('name', 'LIKE', "%$collection%");
              })
              ->orWhereHas('unitConfigurations', function ($q) use ($collection) { // Search by unit configurations
                  $q->where('beds', 'LIKE', "%$collection%");
              })
              ->orWhereRaw('LOWER(project_type) LIKE ?', ["%$collection%"]); // Search by project type
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


public function filtersprojects(Request $request)
{
    $pageTitle = 'Apartments';

    // Retrieve input parameters as comma-separated strings
    $beds = $request->input('beds', ''); // Comma-separated string for beds
    $types = $request->input('property_type', ''); // Comma-separated string for types
    $priceRange = $request->input('budgets', ''); // Comma-separated string for budgets
    $areaNames = $request->input('areas', ''); // Comma-separated string for areas
    $projectName = $request->input('name', ''); // Get project name for filtering
    $builders = $request->input('builders', ''); // Comma-separated string for builders
    $searchQuery = $request->query('search', ''); // Get the search input (default to empty)

    // Start building the query
    $query = Project::with(['citites', 'areas', 'elevationPictures', 'unitConfigurations'])
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

    // Filter by builders using the company_id JSON field
// Filter by builders using the company slug field
// Filter by builders using the company slug field
if (!empty($builders)) {
    $buildersArray = explode(',', $builders); // Convert the comma-separated string into an array

    // Fetch the company IDs corresponding to the passed slugs
    $companyIds = Company::whereIn('slug', $buildersArray)->pluck('id')->toArray();

    // If we have company IDs, filter projects by those company IDs (stored in the company_id JSON field)
    if (!empty($companyIds)) {
        $query->where(function ($q) use ($companyIds) {
            foreach ($companyIds as $companyId) {
                // Ensure proper format for JSON_CONTAINS
                $q->orWhereRaw("JSON_CONTAINS(company_id, '\"$companyId\"') OR company_id LIKE '%\"$companyId\"%' OR company_id LIKE '%\"$companyId' OR company_id LIKE '%$companyId\"%'");
            }
        });
    }
}



    // Filter by search query (name, area, unit configurations, or project type)
    if (!empty($searchQuery)) {
        $query->where(function ($q) use ($searchQuery) {
            $q->where('name', 'LIKE', "%$searchQuery%") // Search by project name
              ->orWhereHas('areas', function ($q) use ($searchQuery) { // Search by area name
                  $q->where('name', 'LIKE', "%$searchQuery%");
              })
              ->orWhereHas('unitConfigurations', function ($q) use ($searchQuery) { // Search by unit configurations
                  $q->where('beds', 'LIKE', "%$searchQuery%");
              })
              ->orWhereRaw('LOWER(project_type) LIKE ?', ["%$searchQuery%"]); // Search by project type
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




public function index($any = null)
{
    // Break the URL into segments
    $segments = explode('/', $any);

    // Initialize variables for each type of segment
    $builders = null;
    $collection = null;
    $topLocations = null;
    $budgets = null;
    $project = null;

    // Iterate through the segments and extract values
    for ($i = 0; $i < count($segments); $i++) {
        switch ($segments[$i]) {
            case 'builders':
                $builders = $segments[$i + 1] ?? null;
                break;
            case 'collection':
                $collection = $segments[$i + 1] ?? null;
                break;
            case 'top-locations':
                $topLocations = $segments[$i + 1] ?? null;
                break;
            case 'budgets':
                $budgets = $segments[$i + 1] ?? null;
                break;
            case 'project':
                $project = $segments[$i + 1] ?? null;
                break;
        }
    }

    // Return the common view and pass the values as data to the view
    return view('filtes-demo', [
        'builders' => $builders,
        'collection' => $collection,
        'topLocations' => $topLocations,
        'budgets' => $budgets,
        'project' => $project,

    ]);
}

}
