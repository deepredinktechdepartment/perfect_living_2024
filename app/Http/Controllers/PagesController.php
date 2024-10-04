<?php

// app/Http/Controllers/PagesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;
use App\Models\SearchLog;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Str;
use App\Models\Collection;

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
            case 'propertytype':
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


    $pageTitle = 'Properties'; // Default title

    if (!empty($searchQuery)) {
            try{
            $saveSarchKeywords=$this->saveSarchKeywords($request,$searchQuery);

            }  catch (\Exception $e) {

            }
}



    // Start building the query
    $query = Project::with(['citites', 'areas', 'elevationPictures', 'unitConfigurations'])
                    ->isApproved(true);

    // Filter by project name if provided
    if (!empty($projectName)) {
        $query->where('name', 'LIKE', "%$projectName%");
    }

    // Filter by beds if provided (comma-separated string)
    if (!empty($beds)) {
       
          // Check if 'beds' exists in GET or POST, if not, set a default value (e.g., 3BHK)
    if (!$request->has('beds')) {
        // Set the 'beds' query parameter if it's not present
        $request->merge(['beds' => $beds]); // Assuming 3 beds for 3BHK
    }
       
        $bedsArray = explode(',', $beds); // Convert the comma-separated string into an array
        $query->whereHas('unitConfigurations', function ($q) use ($bedsArray) {
            $q->whereIn('beds', $bedsArray);
        });

       // Generate dynamic page title using the first value from $bedsArray
    $bedsTitle = implode(',', $bedsArray); // If multiple bed options are selected, it will display like '2,3'
    $pageTitle = $bedsTitle . ' BHK Properties in Hyderabad';
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

        if (!empty($priceRange)) {
            $priceArray = explode(',', $priceRange); // Convert the comma-separated string into an array

            if (count($priceArray) === 2) {
                // Check if the first value is 0 and adjust the title accordingly
                if ($priceArray[0] == 0) {
                    $pageTitle = 'Properties under ' . $priceArray[1] . ' Cr'; // Do not show 0 Cr
                } else {
                    $pageTitle = 'Properties between ' . $priceArray[0] . ' Cr & ' . $priceArray[1] . ' Cr';
                }
            } elseif (count($priceArray) === 1) {
                // If there is only one price, adjust the title accordingly
                $pageTitle = 'Properties priced at ' . $priceArray[0] . ' Cr';
            }
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

        $locations=$areaNames??'';
        if (!empty($locations)) {
            try {
                // Try to split the locations into an array
                $locationArray = explode(',', $locations);
                $locationCount = count($locationArray);

                // Handle the cases based on the count of locations
                if ($locationCount === 1) {
                    // If there is only one location
                    $pageTitle = 'Properties at ' . ucfirst(trim($locationArray[0]));
                } elseif ($locationCount === 2) {
                    // If there are exactly two locations
                    $pageTitle = 'Properties in ' . ucfirst(trim($locationArray[0])) . '-' . ucfirst(trim($locationArray[1]));
                } elseif ($locationCount > 2) {
                    // If there are more than two locations, show the first and last location
                    $pageTitle = 'Properties in ' . ucfirst(trim($locationArray[0])) . '-' . ucfirst(trim(end($locationArray)));
                } else {
                    // If $locationArray is empty, handle the error
                    throw new Exception('Invalid locations format');
                }

            } catch (Exception $e) {
                // Handle any potential errors here
                $pageTitle = 'Invalid Properties'; // Default fallback message
                // You can also log the error or display a more detailed message if needed
                error_log($e->getMessage());
            }
        } else {
            // Fallback in case $locations is empty or not provided
            $pageTitle = 'Properties data missing';
        }

    }

    // Filter by builders using the company_id JSON field
// Filter by builders using the company slug field
// Filter by builders using the company slug field
if (!empty($builders)) {
    $buildersArray = explode(',', $builders); // Convert the comma-separated string into an array

          // Check if 'beds' exists in GET or POST, if not, set a default value (e.g., 3BHK)
    if (!$request->has('propertytype')) {
        // Set the 'beds' query parameter if it's not present
        //$request->merge(['propertytype' => $builders]); // Assuming 3 beds for 3BHK
    }

    // Fetch the company IDs corresponding to the passed slugs
    $companyIds = Company::whereIn('slug', $buildersArray)->pluck('id')->toArray();
    $companynames = Company::whereIn('slug', $buildersArray)->first();
    $pageTitle = "Properties by ". Str::title($companynames->name)??'';


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

        $query->where(function ($q) use ($searchQuery,$request) {

            $buildersArray = explode(',', $searchQuery);




            // Fetch the company IDs corresponding to the passed slugs using LIKE
            $companyIds = Company::where(function ($query) use ($buildersArray) {
                foreach ($buildersArray as $builder) {
                    $query->orWhere('name', 'LIKE', '%' . trim($builder) . '%'); // Use LIKE for partial matches
                }
            })->pluck('id')->toArray();

            $companyIds=$companyIds[0]??'';

            $q->where('name', 'LIKE', "%$searchQuery%") // Search by project name
              ->orWhereHas('areas', function ($q) use ($searchQuery) { // Search by area name
                  $q->where('name', 'LIKE', "%$searchQuery%");
              })
              ->orWhereHas('unitConfigurations', function ($q) use ($searchQuery) { // Search by unit configurations
                  $q->where('beds', 'LIKE', "%$searchQuery%");
              })
              ->orWhereRaw('LOWER(project_type) LIKE ?', ["%$searchQuery%"]) // Search by project type
              ->orWhereRaw("JSON_CONTAINS(JSON_UNQUOTE(company_id), ?, '$') AND JSON_LENGTH(company_id) > 0", [json_encode((string)$companyIds)]);
        });


        $pageTitle = 'Properties by '; // Initialize pageTitle

        // Error handling for invalid or missing inputs
        try {
            // Check if beds are available and append to the title
            if (!empty($request->beds)) {
                if (is_numeric($request->beds)) {
                    $pageTitle .= $request->beds . ' BHK '; // Append number of beds with BHK
                } else {
                    throw new Exception('Invalid value for beds');
                }
            }

            // Check if property type is available and append to the title
            if (!empty($request->propertytype)) {
                $pageTitle .= htmlspecialchars($request->propertytype) . ' '; // Sanitize and append project type
            }

            // Check if budget (prices) is available and in the correct format "min-max"
            if (!empty($request->budgets)) {
                $budgetRange = explode('-', $request->budgets); // Split the budget range by '-'

                if (count($budgetRange) == 2 && is_numeric($budgetRange[0]) && is_numeric($budgetRange[1])) {
                    // Append the formatted budget range
                    $pageTitle .= 'between ' . floatval($budgetRange[0]) . ' Cr to ' . floatval($budgetRange[1]) . ' Cr';
                } else {
                    throw new Exception('Invalid budget format. Please provide in "min-max" format');
                }
            }

            // If all values (beds, propertytype, and budget) are empty, use the searchQuery key
            if (empty($request->beds) && empty($request->propertytype) && empty($request->budgets)) {
                if (!empty($searchQuery)) {
                    $pageTitle .= htmlspecialchars($searchQuery); // Sanitize and use the search key
                } else {
                    throw new Exception('No search parameters provided');
                }
            }
        } catch (Exception $e) {
            // Handle any caught exceptions by setting an error page title or logging
            $pageTitle = 'Error: ' . $e->getMessage();
        }

        // Trim any extra spaces from the final page title
        $pageTitle = trim($pageTitle);

        // Return or display the pageTitle as needed







    }


    if (!empty($collection)) {
    $query->where(function ($q) use ($collection) {

        // Attempt to fetch the collection data using the slug or name
        $collectionData = Collection::where('slug', 'LIKE', "%$collection%")
            ->orWhere('name', 'LIKE', "%$collection%")
            ->first();

        // Check if collection data exists
        if ($collectionData) {
            $collectionId = $collectionData->id; // Get the collection ID
            $pageTitle = $collectionData->name ?? '';  // Set the page title based on collection name


            // Query the projects where 'map_collections' contains the collection ID
            // The 'map_collections' column stores a JSON array, so we use whereJsonContains
            $q->orwhereJsonContains('map_collections', (string) $collectionId); // Cast to string for matching

            // Add the map_collections condition using JSON_CONTAINS and JSON_UNQUOTE


        } else {
            // Collection not found, handle accordingly
            $pageTitle = '';
            throw new Exception("Collection not found for the given slug or name: $collection");
        }
    });
}


    // Execute the query and get results
    $projects = $query->orderBy('updated_at', 'desc')->get();


    // If all filters are empty, return an empty collection
    if (empty($beds) && empty($types) && empty($priceRange) && empty($areaNames) && empty($projectName) && empty($searchQuery) && empty($builders) && empty($collection) ) {
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


public function saveSarchKeywords($request,$searchQuery)
{

    // Validate the search query

  // Create an instance of the Agent
  $agent = new Agent();

  // Get the IP address of the user
  $ip = $request->ip();

  // Get the location using your getLocationByIp function (if defined)
  $location = $this->getLocationByIp($ip); // Optional

  // Detect if it's a mobile device, tablet, or desktop
  $device = 'Desktop'; // Default to desktop
  if ($agent->isMobile()) {
      $device = 'Mobile';
  } elseif ($agent->isTablet()) {
      $device = 'Tablet';
  }

  // Get the platform (OS) and browser
  $platform = $agent->platform();  // e.g., Windows, iOS, Android
  $browser = $agent->browser();    // e.g., Chrome, Firefox, Safari

  // Log the search keyword, IP address, location, and device
  SearchLog::create([
      'user_id' => auth()->user()->id ?? 0,
      'keyword' => $searchQuery??null, // Search query from request
      'ip_address' => $ip??null,
      'location' => $location??null,
      'device' => $device??null,
      'platform' => $platform??null,
      'browser' => $browser??null,
  ]);



}

public function getLocationByIp($ip)
{
    // Default location in case the API response is empty or doesn't contain location data
    $defaultLocation = 'Unknown Location';

    try {
        // Make the API request to ipinfo.io
        $response = file_get_contents("http://ipinfo.io/{$ip}/json");

        // Parse the response
        $details = json_decode($response);

        // Check if 'city' and 'region' are set in the response object
        $city = isset($details->city) ? $details->city : 'Unknown City';
        $region = isset($details->region) ? $details->region : 'Unknown Region';

        // Return the formatted location (city, region)
        return $city . ', ' . $region;
    } catch (\Exception $e) {
        // Return default location if there's an error with the API request
        return $defaultLocation;
    }
}

public function showSearchKeywords()
{
    try {
        // Fetch the search logs with pagination
        $searchLogs = SearchLog::orderBy('created_at', 'desc')->paginate(10);

        // Return the view with the search logs data
        $pageTitle="Search Keywords";
        return view('reports.searchKeywords', compact('searchLogs','pageTitle'));
    } catch (Exception $e) {
        // Log the error message if needed
        \Log::error('Failed to fetch search logs: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->with('error', 'Failed to fetch search logs. Please try again later.');
    }
}
public function deleteLog($id)
{
    try {
        // Find and delete the log entry
        $log = SearchLog::findOrFail($id);
        $log->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Search log deleted successfully.');
    } catch (Exception $e) {
        // Handle any errors and return with an error message
        return redirect()->back()->with('error', 'Failed to delete search log: ' . $e->getMessage());
    }
}

}