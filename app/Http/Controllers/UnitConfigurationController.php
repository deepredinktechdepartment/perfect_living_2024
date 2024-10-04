<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\UnitConfiguration as Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UnitConfigurationController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Retrieve the project by its ID from the request
            $project = Project::findOrFail($request->projectID);

            // Retrieve the units related to this project
            $units = $project->unitConfigurations; // Assuming 'unitConfigurations' is the correct relationship name

            // Generate the add link for creating new units
            $addlink = route('unit_configurations.create', ['projectID'=>$project->id]);

            $pageTitle = "Unit Configurations for ". $project->name ?? ''; // Set the page title

            // Return the view with the project, units, and addlink variables
            return view('projects.units.index', compact('project', 'units', 'addlink', 'pageTitle'));
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while fetching the unit configurations.');
        }
    }

    public function create(Request $request)
    {
        try {
            // Retrieve the project by its ID from the request
            $project = Project::findOrFail($request->projectID);
            // Pass the project to the view
            $pageTitle = "Add Units for " . $project->name ?? ''; // Set the page title
            return view('projects.units.create', compact('project', 'pageTitle'));
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while opening the unit creation form.');
        }
    }

    public function store(Request $request)
    {

        // Validate the request with file rules
        $request->validate([
            'project_id' => 'required|integer',
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'balconies' => 'required|integer|min:0',
            'facing' => 'required|string|min:2',
            'unit_size' => 'required|numeric|min:0.1',
            'floor_plan' => 'required|file|mimes:jpg,jpeg|max:512', // 1MB
        ]);

        try {
            // Handle file upload
            $filePath = null;
            $project = Project::findOrFail($request->project_id);
            if ($request->hasFile('floor_plan')) {
                $file = $request->file('floor_plan');
                $filePath = $file->store('unit-configurations', 'public'); // Save file and get path
            }

            // Create the unit configuration
            $project->unitConfigurations()->create(array_merge(
                $request->except('floor_plan'),
                ['floor_plan' => $filePath]
            ));

            return redirect()->route('unit_configurations.index',  ["projectID"=>$project->id])->with('success', 'Unit created successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while creating the unit.');
        }
    }

    public function edit(Project $project, Unit $unit)

    {
        try {
            $pageTitle = "Edit Units for " . $project->name ?? ''; // Set the page title
            return view('projects.units.create', compact('project', 'unit','pageTitle'));
        } catch (\Exception $e) {


            return redirect()->back()->with('error', 'An error occurred while opening the unit edit form.');
        }
    }

    public function update(Request $request, Project $project, Unit $unit)
    {
        // Validate the request with file rules
        $request->validate([
            'project_id' => 'required|integer',
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'balconies' => 'required|integer|min:0',
            'facing' => 'required|string|min:2',
            'unit_size' => 'required|numeric|min:0.1',
            'floor_plan' => 'nullable|file|mimes:jpg,jpeg|max:512', // 512KB
        ]);


        try {
            // Handle file upload
            $filePath = $unit->floor_plan; // Preserve existing file path
            if ($request->hasFile('floor_plan')) {
                // Delete old file
                if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                // Store new file
                $file = $request->file('floor_plan');
                $filePath = $file->store('unit-configurations', 'public');
            }


            // Update the unit configuration
            $unit->update(array_merge(
                $request->except('floor_plan'),
                ['floor_plan' => $filePath]
            ));



            return redirect()->route('unit_configurations.index', ['projectID' => $project->id])->with('success', 'Unit updated successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while updating the unit.');
        }
    }
    public function destroy(Request $request, Project $project, Unit $unit)
    {
        try {
            // Ensure the unit belongs to the specified project
            if ($unit->project_id != $project->id) {
                return redirect()->back()->with('error', 'The specified unit does not belong to the specified project.');
            }

            // Delete file if it exists
            if ($unit->floor_plan && Storage::disk('public')->exists($unit->floor_plan)) {
                Storage::disk('public')->delete($unit->floor_plan);
            }

            // Delete the unit
            $unit->delete();

            return redirect()->back()->with('success', 'Unit deleted successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while deleting the unit.');
        }
    }


}
