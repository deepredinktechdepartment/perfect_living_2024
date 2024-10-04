<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ElevationPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ElevationPictureController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Retrieve the project by its ID from the request
            $project = Project::findOrFail($request->projectID);

            // Retrieve the elevation pictures related to this project
            $pictures = $project->elevationPictures; // Assuming 'elevationPictures' is the correct relationship name

            // Generate the add link for creating new elevation pictures
            $addlink = route('elevation_pictures.create', ['projectID' => $project->id]);

            $pageTitle = "Elevation Pictures for " . $project->name ?? ''; // Set the page title

            // Return the view with the project, pictures, and addlink variables
            return view('projects.elevation_pictures.index', compact('project', 'pictures', 'addlink', 'pageTitle'));
        } catch (\Exception $e) {

            // Log the error and redirect back with an error message
            Log::error('Error fetching elevation pictures for project ID ' . $request->projectID . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching the elevation pictures.');
        }
    }

    public function create(Request $request)
    {
        try {

            // Retrieve the project by its ID from the request
            $project = Project::findOrFail($request->projectID);
            // Pass the project to the view
            $pageTitle = "Add Elevation Picture for " . $project->name ?? ''; // Set the page title
            return view('projects.elevation_pictures.create', compact('project', 'pageTitle'));
        } catch (\Exception $e) {

            // Log the error and redirect back with an error message
            Log::error('Error displaying elevation picture creation form for project ID ' . $request->projectID . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while opening the elevation picture creation form.');
        }
    }

    public function store(Request $request)
    {
        // Validate the request with file rules
        $request->validate([
            'project_id' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'file' => 'required|image|mimes:jpeg,jpg|max:512', // 512KB
        ]);

        try {
            // Handle file upload
            $filePath = $request->file('file')->store('elevation_pictures', 'public'); // Save file and get path

            // Create the elevation picture
            ElevationPicture::create([
                'project_id' => $request->project_id,
                'title' => $request->title??'',
                'file_path' => $filePath
            ]);

            return redirect()->route('elevation_pictures.index', ['projectID' => $request->project_id])
                             ->with('success', 'Elevation Picture added successfully.');
        } catch (\Exception $e) {


            return redirect()->back()->with('error', 'An error occurred while creating the elevation picture.');
        }
    }

    public function edit(Project $project, ElevationPicture $picture)
    {
        try {
            return view('projects.elevation_pictures.create', compact('picture', 'project'));
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while opening the elevation picture edit form.');
        }
    }

    public function update(Request $request, Project $project, ElevationPicture $picture)
    {

        // Validate the request
        $request->validate([
            'project_id' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,jpg|max:512', // 512KB
        ]);

        try {




            // Check if the existing file path exists and if a new file is uploaded
            if ($picture->file_path && $request->hasFile('file')) {
                // Handle file upload

                // Delete old file
                if (Storage::disk('public')->exists($picture->file_path)) {
                    Storage::disk('public')->delete($picture->file_path);
                }

                // Store the new file and update the file path
                $filePath = $request->file('file')->store('elevation_pictures', 'public');
            } else {
                // If no new file is uploaded, keep the existing file path
                $filePath = $picture->file_path;
            }

            // Update the elevation picture
            $picture->update([
                'title' => $request->title ?? '',
                'file_path' => $filePath
            ]);

            return redirect()->route('elevation_pictures.index', ['projectID' => $picture->project_id])
                             ->with('success', 'Elevation Picture updated successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::error('Error updating elevation picture ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the elevation picture.');
        }
    }


    public function destroy(Request $request, Project $project, ElevationPicture $picture)
    {
        try {
            // Ensure the picture belongs to the specified project
            if ($picture->project_id != $project->id) {
                return redirect()->back()->with('error', 'The specified picture does not belong to the specified project.');
            }

            // Delete file if it exists
            if ($picture->file_path && Storage::disk('public')->exists($picture->file_path)) {
                Storage::disk('public')->delete($picture->file_path);
            }

            // Delete the picture
            $picture->delete();

            return redirect()->route('elevation_pictures.index', ['projectID' => $project->id])
                             ->with('success', 'Elevation Picture deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting elevation picture ID ' . $picture->id . ' for project ID ' . $project->id . ': ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the elevation picture.');
        }
    }

}
