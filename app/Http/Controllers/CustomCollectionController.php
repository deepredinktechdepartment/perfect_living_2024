<?php
namespace App\Http\Controllers;

use App\Models\CustomCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class CustomCollectionController extends Controller
{
    public function index()
    {
        $pageTitle="Collections";
        $collections = CustomCollection::with('projects')->get();  // Eager load projects
        return view('customcollections.index', compact('collections','pageTitle'));
    }

    public function create()
    {
        $projects = Project::all();  // Fetch all projects
        $pageTitle="Create New Collection";

        return view('customcollections.create', compact('projects','pageTitle'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'projects' => 'required|array',
            'projects.*' => 'exists:projects,id',
        ]);

        // Create a new collection
        $collection = CustomCollection::create($request->only('name'));

        // Attach selected projects
        $collection->projects()->attach($request->projects);

        return redirect()->route('customcollections.index')->with('success', 'Collection created successfully!');
    }

    public function edit(Collection $collection)
    {
        $projects = Project::all();  // Fetch all projects
        return view('customcollections.edit', compact('projects', 'collection'));
    }

    public function update(Request $request, Collection $collection)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'projects' => 'required|array',
            'projects.*' => 'exists:projects,id',
        ]);

        // Update the collection
        $collection->update($request->only('name'));

        // Sync the selected projects
        $collection->projects()->sync($request->projects);

        return redirect()->route('customcollections.index')->with('success', 'Collection updated successfully!');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('customcollections.index')->with('success', 'Collection deleted successfully!');
    }
}
