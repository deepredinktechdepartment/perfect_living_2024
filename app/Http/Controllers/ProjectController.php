<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use App\Models\Collection;
use App\Models\Badge;
use App\Models\Amenity;
use App\Models\CityMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Review;
use Illuminate\Support\Facades\URL; // Add this line
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    protected $companies;
    protected $collections;
    protected $badges;
    protected $aminities;
    protected $cities;

    public function __construct()
    {
        try {
            $this->companies = Company::all();
            $this->collections = Collection::all();
            $this->badges = Badge::all();
            $this->aminities = Amenity::all();
            $this->cities = CityMaster::all();
        } catch (Exception $e) {
            $this->companies = collect(); // Fallback to an empty collection
            $this->collections = collect(); // Fallback to an empty collection
            $this->badges = collect(); // Fallback to an empty collection
            $this->aminities = collect(); // Fallback to an empty collection
            $this->cities = collect(); // Fallback to an empty collection
        }
    }

    public function index(Request $request): View
{
    try {
        // Get the 'tab' query parameter or default to 'newly_added'
        $tab = $request->query('tab', 'newly_added');
        $companyId = $request->query('company_id'); // Get company_id from the query parameters

        // Valid status values
        $validStatuses = ['newly_added', 'in_review', 'published', 'deactivated', 'all'];

        // Initialize status counts array with default values, including 'all'
        $statusCounts = [
            'newly_added' => 0,
            'in_review' => 0,
            'published' => 0,
            'deactivated' => 0,
            'all' => 0,  // Add 'all' status
        ];

        // Build the query for counting projects
        $query = Project::query();

        // If company_id exists, add condition to the query
        if ($companyId) {
            $query->whereRaw("JSON_CONTAINS(JSON_UNQUOTE(company_id), ?, '$') AND JSON_LENGTH(company_id) > 0", [json_encode((string)$companyId)]);
        }

        // Count total projects for 'all' key
        $totalProjectsCount = $query->count();
        $statusCounts['all'] = $totalProjectsCount;  // Set 'all' count

        // If the tab is 'all', we don't need to filter by status
        if ($tab === 'all') {
            // Fetch all projects without status filtering
            $projects = $query->get();
        } elseif (in_array($tab, $validStatuses)) {
            // Filter by specific status
            $query->where('status', $tab);
            // Fetch projects based on selected status
            $projects = $query->get();
        } else {
            // Handle invalid status
            throw new \InvalidArgumentException('Invalid status provided.');
        }

        // Initialize status counts based on the presence of company_id
        $statusCountsQuery = Project::select('status', \DB::raw('count(*) as count'))
            ->groupBy('status');

        // Add condition for status counts if company_id exists
        if ($companyId) {
            $statusCountsQuery->whereRaw("JSON_CONTAINS(JSON_UNQUOTE(company_id), ?, '$') AND JSON_LENGTH(company_id) > 0", [json_encode((string)$companyId)]);
        }

        // Fetch status counts
        $counts = $statusCountsQuery->pluck('count', 'status')->toArray();

        // Merge counts into the statusCounts array
        foreach ($counts as $status => $count) {
            if (array_key_exists($status, $statusCounts)) {
                $statusCounts[$status] = $count;
            }
        }

        // If any status is not set, ensure it defaults to 0
        foreach ($validStatuses as $status) {
            if (!isset($statusCounts[$status])) {
                $statusCounts[$status] = 0;
            }
        }

        $pageTitle = 'Projects List'; // Set the page title
        $addlink = route('projects.create'); // Link to the create page

        // Pass the projects and other variables to the view
        return view('projects.index', compact('projects', 'addlink', 'pageTitle', 'tab', 'statusCounts'));
    } catch (Exception $e) {
        // Log the error message if needed
        // Log::error('Failed to fetch projects: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->with('error', 'Failed to fetch projects.');
    }
}






    public function create(): View
    {

        $pageTitle = 'Create Project'; // Set the page title
        return view('projects.create', ['pageTitle'=>$pageTitle,'companies' => $this->companies,'collections' => $this->collections,'badges' => $this->badges,'amenities' => $this->aminities,'cities' => $this->cities]);
    }

    public function store(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|string|max:255|unique:projects,name',
       // Update company_id to accept multiple values as an array
       'company_id' => 'required|array',
       'company_id.*' => 'exists:companies,id', // Validate that each company ID exists in the database
        'site_address' => 'required|string',
        'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'master_plan_layout' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'website_url' => 'nullable|url',
        'project_type' => 'required',
        'no_of_acres' => 'nullable',
        'no_of_towers' => 'nullable',
        'no_of_units' => 'nullable',
        'price_per_sft' => 'nullable',
        'about_project' => 'nullable',
        'city_id' => 'required',
        'area_id' => 'required',
        'status' => 'required',

        // Add validation rules for other fields
    ]);

    try {
        $data = $validator;

        // Handle the file upload for 'logo'
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('projects', 'public');
            $data['logo'] = $logoPath;
        }

        // Handle the file upload for 'master_plan_layout'
        if ($request->hasFile('master_plan_layout')) {
            $masterPlanPath = $request->file('master_plan_layout')->store('projects', 'public');
            $data['master_plan_layout'] = $masterPlanPath;
        }

        // Convert checkbox values to JSON format

         $data['company_id'] = $request->has('company_id') ? json_encode($request->input('company_id')) : null;

        $data['slug'] = Str::slug($request->name)??null;
        $data['city'] = $request->city_id??0;
        $data['area'] = $request->area_id??0;
       // Store company_id as a JSON array


        // Create a new project with the specified columns
        Project::create($data);



        // Return a view with a success message
        return redirect()->route('projects.index', ['tab' => $request->query('tab', 'newly_added')])->with('success', 'Project created successfully.');
    } catch (Exception $e) {
        // Log the error message if needed
        // Log::error('Failed to create project: ' . $e->getMessage());

        return redirect()->route('projects.index', ['tab' => $request->query('tab', 'newly_added')])->with('error', 'Failed to create project.');
    }
}


    public function edit(Project $project): View
    {
        $pageTitle = 'Edit Project'; // Set the page title
        return view('projects.create', ['pageTitle'=>$pageTitle,'project' => $project, 'companies' => $this->companies,'collections' => $this->collections,'badges' => $this->badges,'amenities' => $this->aminities,'cities' => $this->cities]);
    }

    public function update(Request $request, Project $project)
{

    // Validate the request
    $validator = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            // Ensure name is unique except for the current project
            Rule::unique('projects', 'name')->ignore($project->id),
        ],
        // Allow 'company_id' to accept an array of IDs


        'site_address' => 'required|string',
        'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'master_plan_layout' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'website_url' => 'nullable|url',
        'status' => 'required',
        'project_type' => 'required',



        'company_id' => 'required|array',      // Expecting an array
        'no_of_acres' => 'nullable',
        'no_of_towers' => 'nullable',
        'no_of_units' => 'nullable',
        'price_per_sft' => 'nullable',
        'about_project' => 'nullable',
        'city_id' => 'required',
        'area_id' => 'required',

        // Add validation rules for other fields
    ]);

    try {
        // Prepare data for update
        $data = $validator;

        // Convert checkbox values to JSON format if present, otherwise set to null

        $data['company_id'] = $request->has('company_id') ? json_encode($request->input('company_id')) : null;



        $data['city'] = $request->city_id??0;
        $data['area'] = $request->area_id??0;





        // Handle the file upload for 'logo'
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($project->logo) {
                Storage::disk('public')->delete($project->logo);
            }

            // Store the new logo
            $logoPath = $request->file('logo')->store('projects', 'public');
            $data['logo'] = $logoPath;
        }

        // Handle the file upload for 'master_plan_layout'
        if ($request->hasFile('master_plan_layout')) {
            // Delete old master plan layout if it exists
            if ($project->master_plan_layout) {
                Storage::disk('public')->delete($project->master_plan_layout);
            }

            // Store the new master plan layout
            $masterPlanPath = $request->file('master_plan_layout')->store('projects', 'public');
            $data['master_plan_layout'] = $masterPlanPath;
        }

        // Update the project with the validated data
        $project->update($data);



        // Redirect with success message
        return redirect()->route('projects.index', ['tab' =>$project->status])->with('success', 'Project updated successfully.');
    } catch (Exception $e) {
        // Optionally log the error message
        // Log::error('Failed to update project: ' . $e->getMessage());

        // Redirect with error message
        return redirect()->route('projects.index', ['tab' => $project->status])->with('error', 'Failed to update project.');
    }
}


    public function destroy(Project $project)
    {
        try {
            // Check if the project has an associated logo and delete it
            if ($project->logo && Storage::disk('public')->exists($project->logo)) {
                Storage::disk('public')->delete($project->logo);
            }

            // Delete the project record from the database
            $project->delete();

            // Return a view with a success message

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
        } catch (Exception $e) {
            // Log the error message
            Log::error('Failed to delete project with ID ' . $project->id . ': ' . $e->getMessage());

            // Return a view with an error message

            return redirect()->route('projects.index')->with('error', 'Failed to delete project.');
        }
    }


public function companySingleProject(Request $request, $slug)
{
    try {



        // Attempt to retrieve the project by slug
        $project = Project::with('citites', 'areas','elevationPictures','unitConfigurations')->where('slug', $slug)->firstOrFail();

   $groupedConfigurations = [];

if ($project && $project->unitConfigurations->isNotEmpty()) {
// Group the unit configurations by 'beds'
$groupedConfigurations = $project->unitConfigurations->groupBy('beds');
// Sort the grouped configurations by the bed count in ascending order
$groupedConfigurations = $groupedConfigurations->sortKeys();
}





        // Set the page title dynamically if needed




        $reviews = Review::with('project')->where('approval_status',1)->where('project_id', $project->id??0)->get();

        // Calculate average rating
        $averageRating = $reviews->avg('star_rating');

        // Round the average rating to 1 decimal place
        $roundedRating = round($averageRating);

        // Decode JSON fields, handling potential errors and defaulting to empty arrays if invalid or not set
    $mapCollections = $this->decodeJsonIfExists($project->map_collections);
    $mapBadges = $this->decodeJsonIfExists($project->map_badges);

    // Fetch actual badge data based on the decoded JSON IDs
    $badges = Badge::whereIn('id', $mapBadges)->get();


     // Fetch actual collection data based on IDs in $mapCollections
    $highlightImages = Collection::whereIn('id', $mapCollections)->get();

    $pageTitle = Str::title($project->name ?? 'Project') . " at " . Str::title($project->areas->name ?? 'Location') . " - Project details and reviews";


        return view('frontend.projects.show', compact('project', 'pageTitle','highlightImages','badges','groupedConfigurations','reviews','roundedRating'));

    } catch (ModelNotFoundException $e) {
        // Optionally, return a custom 404 page or redirect with an error message
        return redirect()->back()->with('error', 'Project not found.');
    } catch (\Exception $e) {

        // Optionally, return a generic error page or message
        return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
    }
}
private function decodeJsonIfExists($jsonString)
{
    if ($jsonString && $this->isValidJson($jsonString)) {
        return json_decode($jsonString, true);
    }

    return [];
}

/**
 * Check if a given string is valid JSON.
 *
 * @param  string  $string
 * @return bool
 */
private function isValidJson($string)
{
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}
public function toggleApproval(Request $request, Project $project)
{
    try {
        // Update the project's approval status
        $project->status = $request->input('is_approved');
        $project->save();

        return response()->json([
            'success' => true,
            'message' => 'Approval status updated successfully.'
        ]);
    } catch (\Exception $e) {
        // Log the exception and return a failed response

        return response()->json([
            'success' => false,
            'message' => 'Failed to update approval status. Please try again later.'
        ], 500);
    }
}

// app/Http/Controllers/ProjectController.php


public function filter(Request $request)
{

    $companyId = $request->input('company_id');

    $projects = Project::query()
        ->when($companyId, function($query, $companyId) {
            return $query->whereJsonContains('company_id', $companyId);
        })
        ->get();



    return response()->json(['projects' => $projects]);
}

public function updateFeaturedStatus(Request $request)
{

    $project = Project::find($request->input('id'));

    if ($project) {
        $project->is_featured = $request->input('status');
        $project->save();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 404);
}

public function showAmenities($id)
{
    try {
        // Attempt to find the project by ID
        $project = Project::findOrFail($id);
        $amenities = Amenity::orderBy('name', 'asc')->get();

        // Set the page title dynamically if needed
        $pageTitle = "Amenities for ".$project->name ?? '';

        return view('projects.amenities', compact('amenities', 'project', 'pageTitle'));
    } catch (\Exception $e) {
        // Handle exceptions gracefully, no logging
        return redirect()->back()->with('error', 'Unable to load amenities. Please try again.');
    }
}


public function updateAmenities(Request $request, $id)
{
    // Validate that at least one amenity is selected
    $request->validate([
        'amenities' => 'required|array|min:1',  // The 'min:1' ensures that at least one checkbox is selected
    ], [
        'amenities.required' => 'Please select at least one amenity.',
        'amenities.min' => 'Please select at least one amenity.'
    ]);

    try {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Get the selected amenities (if none are selected, it will trigger the validation error)
        $selectedAmenities = $request->input('amenities', []);

        // Encode the selected amenities as JSON to store in the database
        $project->amenities = json_encode($selectedAmenities);

        // Save the project
        $project->save();

        // Optionally, add a success message
        return redirect()->route('projects.index')->with('success', 'Amenities updated successfully.');
    } catch (\Exception $e) {
        // Return with an error message but don't log the exception
        return redirect()->back()->with('error', 'Something went wrong while updating amenities. Please try again.');
    }
}
public function editCollections($id)
{
    try {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Fetch all collections
        $collections = Collection::all(); // Assuming you have a Collection model

 // Set the page title dynamically if needed
        $pageTitle = "Collections for ".$project->name ?? '';

        return view('projects.collections', compact('project', 'collections','pageTitle'));
    } catch (\Exception $e) {
        // Handle the exception by returning an error message
        return redirect()->route('projects.index')->with('error', 'Failed to load the project or collections. Please try again.');
    }
}

public function updateCollections(Request $request, $id)
{
    try {
        // Validate that at least one collection is selected
        $request->validate([
            'map_collections' => 'required|array|min:1',  // Ensure at least one collection is selected
        ], [
            'map_collections.required' => 'Please select at least one collection.',
        ]);

        // Find the project by ID
        $project = Project::findOrFail($id);

        // Update the map_collections field
        $project->map_collections = json_encode($request->input('map_collections'));

        // Save the project
        $project->save();

        // Redirect back with success message
        return redirect()->route('projects.index', $project->id)->with('success', 'Collections updated successfully.');
    } catch (\Exception $e) {
        // Handle the exception by returning an error message
        return redirect()->route('projects.index', $id)->with('error', 'Failed to update collections. Please try again.');
    }
}

public function editBadges($id)
{
    try {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Fetch all badges
        $badges = Badge::all(); // Assuming you have a Badge model

         // Set the page title dynamically if needed
        $pageTitle = "Badges for ".$project->name ?? '';

        return view('projects.badges', compact('project', 'badges','pageTitle'));
    } catch (\Exception $e) {
        return redirect()->route('projects.index')->with('error', 'Failed to load the project or badges. Please try again.');
    }
}

public function updateBadges(Request $request, $id)
{
    try {
        // Validate that at least one badge is selected
        $request->validate([
            'map_badges' => 'required|array|min:1',  // Ensure at least one badge is selected
        ], [
            'map_badges.required' => 'Please select at least one badge.',
        ]);

        // Find the project by ID
        $project = Project::findOrFail($id);

        // Update the map_badges field
        $project->map_badges = json_encode($request->input('map_badges'));

        // Save the project
        $project->save();

        // Redirect back with success message
        return redirect()->route('projects.index')->with('success', 'Badges updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update badges. Please try again.');
    }
}



}
