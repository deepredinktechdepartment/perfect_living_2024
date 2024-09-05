<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Exception;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    protected $companies;

    public function __construct()
    {
        try {
            $this->companies = Company::all();
        } catch (Exception $e) {
            Log::error('Failed to fetch companies: ' . $e->getMessage());
            $this->companies = collect(); // Fallback to an empty collection
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
        return view('projects.create', ['companies' => $this->companies]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'company_id' => 'required|exists:companies,id',
            'site_address' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'website_url' => 'nullable|url',
            'project_type' => 'required',
            // Add validation rules for other fields
        ]);

        try {
            $data = $validator;

            // Handle the file upload for 'logo'
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('projects', 'public');
                $data['logo'] = $logoPath;
            }

            // Create a new project with the specified columns
            Project::create($data);

            // Return a view with a success message
            return redirect()->route('projects.index')->with('success', 'Project created successfully.');
        } catch (Exception $e) {


            return redirect()->route('projects.index')->with('error', 'Failed to create project.');
        }
    }

    public function edit(Project $project): View
    {
        return view('projects.create', ['project' => $project, 'companies' => $this->companies]);
    }

    public function update(Request $request, Project $project)
    {
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
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'website_url' => 'nullable|url',
            'project_type' => 'required',
            // Add validation rules for other fields
        ]);

        try {
            $data = $validator;

            if ($request->hasFile('logo')) {
                // Delete old logo if it exists
                if ($project->logo) {
                    Storage::disk('public')->delete($project->logo);
                }

                $logoPath = $request->file('logo')->store('projects', 'public');
                $data['logo'] = $logoPath;
            }

            $project->update($data);
            return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
        } catch (Exception $e) {
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
