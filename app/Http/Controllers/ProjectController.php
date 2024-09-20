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

            // Valid status values
            $validStatuses = ['newly_added', 'in_review', 'published', 'deactivated'];

            // Initialize status counts
            $statusCounts = Project::select('status', \DB::raw('count(*) as count'))
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray();

            // Build the query based on the 'tab' value
            $query = Project::with('company');

            // Check if the tab value is valid
            if (in_array($tab, $validStatuses)) {
                $query->where('status', $tab);
            } else {
                // Handle invalid status
                throw new \InvalidArgumentException('Invalid status provided.');
            }

            // Execute the query
            $projects = $query->get();

            $pageTitle = 'Projects List'; // Set the page title
            $addlink = route('projects.create'); // Link to the create page

            return view('projects.index', compact('projects', 'addlink', 'pageTitle', 'tab', 'statusCounts'));
        } catch (\InvalidArgumentException $e) {
            Log::warning('Invalid status: ' . $e->getMessage());
            return redirect()->route('projects.index', ['tab' => 'newly_added'])
                ->with('error', 'Invalid project status. Redirecting to Newly Added.');
        } catch (\Throwable $e) { // Use Throwable for broader exception handling
            Log::error('Failed to fetch projects: ' . $e->getMessage());
            return view('projects.index')->with('error', 'Failed to fetch projects. Please try again later.');
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
        'company_id' => 'required|exists:companies,id',
        'site_address' => 'required|string',
        'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'master_plan_layout' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'website_url' => 'nullable|url',
        'project_type' => 'required',
        'map_collections' => 'nullable|array', // Expecting an array
        'map_badges' => 'nullable|array',     // Expecting an array
        'amenities' => 'nullable|array',      // Expecting an array
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
        $data['map_collections'] = $request->has('map_collections') ? json_encode($request->input('map_collections')) : null;
        $data['map_badges'] = $request->has('map_badges') ? json_encode($request->input('map_badges')) : null;
        $data['amenities'] = $request->has('amenities') ? json_encode($request->input('amenities')) : null;
        $data['slug'] = Str::slug($request->name)??null;
        $data['city'] = $request->city_id??0;
        $data['area'] = $request->area_id??0;

        // Create a new project with the specified columns
        Project::create($data);

        // Return a view with a success message
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    } catch (Exception $e) {
        // Log the error message if needed
        // Log::error('Failed to create project: ' . $e->getMessage());

        return redirect()->route('projects.index')->with('error', 'Failed to create project.');
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
        'company_id' => 'required|exists:companies,id',
        'site_address' => 'required|string',
        'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        'master_plan_layout' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'latitude' => 'nullable',
        'longitude' => 'nullable',
        'website_url' => 'nullable|url',
        'status' => 'required',
        'project_type' => 'required',
        'map_collections' => 'nullable|array', // Expecting an array
        'map_badges' => 'nullable|array',     // Expecting an array
        'amenities' => 'nullable|array',      // Expecting an array
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
        $data['map_collections'] = $request->has('map_collections') ? json_encode($request->input('map_collections')) : null;
        $data['map_badges'] = $request->has('map_badges') ? json_encode($request->input('map_badges')) : null;
        $data['amenities'] = $request->has('amenities') ? json_encode($request->input('amenities')) : null;
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
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    } catch (Exception $e) {
        // Optionally log the error message
        // Log::error('Failed to update project: ' . $e->getMessage());

        // Redirect with error message
        return redirect()->route('projects.index')->with('error', 'Failed to update project.');
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
        $project = Project::with('company', 'citites', 'areas','elevationPictures','unitConfigurations')->where('slug', $slug)->firstOrFail();

   $groupedConfigurations = [];

if ($project && $project->unitConfigurations->isNotEmpty()) {
// Group the unit configurations by 'beds'
$groupedConfigurations = $project->unitConfigurations->groupBy('beds');
// Sort the grouped configurations by the bed count in ascending order
$groupedConfigurations = $groupedConfigurations->sortKeys();
}





        // Set the page title dynamically if needed
        $pageTitle = $project->name ?? 'Project';

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

    $projects = Project::with('company')
        ->when($companyId, function($query, $companyId) {
            return $query->where('company_id', $companyId);
        })
        ->get();

    $projects->map(function($project) {
        $project->company_name = $project->company->name ?? '';
        $project->preview_url = URL::to('company/project/'.$project->slug);
        return $project;
    });

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


}
