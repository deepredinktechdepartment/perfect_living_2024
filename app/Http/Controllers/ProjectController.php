<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use App\Models\Collection;
use App\Models\Badge;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Exception;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    protected $companies;
    protected $collections;
    protected $badges;
    protected $aminities;

    public function __construct()
    {
        try {
            $this->companies = Company::all();
            $this->collections = Collection::all();
            $this->badges = Badge::all();
            $this->aminities = Amenity::all();
        } catch (Exception $e) {
            $this->companies = collect(); // Fallback to an empty collection
            $this->collections = collect(); // Fallback to an empty collection
            $this->badges = collect(); // Fallback to an empty collection
            $this->aminities = collect(); // Fallback to an empty collection
        }
    }

    public function index(): View
    {
        try {
            $projects = Project::with('company')->get(); // Fetch all projects with company data
            $pageTitle = 'Projects List'; // Set the page title
            $addlink = route('projects.create'); // Link to the create page
            return view('projects.index', compact('projects', 'addlink','pageTitle'));
        } catch (Exception $e) {
            Log::error('Failed to fetch projects: ' . $e->getMessage());
            return view('projects.index')->with('error', 'Failed to fetch projects.');
        }
    }

    public function create(): View
    {

        $pageTitle = 'Create Project'; // Set the page title
        return view('projects.create', ['pageTitle'=>$pageTitle,'companies' => $this->companies,'collections' => $this->collections,'badges' => $this->badges,'amenities' => $this->aminities]);
    }

    public function store(Request $request)
{
    $validator = $request->validate([
        'name' => 'required|string|max:255|unique:projects,name',
        'company_id' => 'required|exists:companies,id',
        'site_address' => 'required|string|max:255',
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
        return view('projects.create', ['pageTitle'=>$pageTitle,'project' => $project, 'companies' => $this->companies,'collections' => $this->collections,'badges' => $this->badges,'amenities' => $this->aminities]);
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
        'site_address' => 'required|string|max:255',
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

        // Add validation rules for other fields
    ]);

    try {
        // Prepare data for update
        $data = $validator;

        // Convert checkbox values to JSON format if present, otherwise set to null
        $data['map_collections'] = $request->has('map_collections') ? json_encode($request->input('map_collections')) : null;
        $data['map_badges'] = $request->has('map_badges') ? json_encode($request->input('map_badges')) : null;
        $data['amenities'] = $request->has('amenities') ? json_encode($request->input('amenities')) : null;

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
}
