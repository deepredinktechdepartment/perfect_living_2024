<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    /**
     * Display a listing of the collections.
     */
    public function index()
    {
        $collections = Collection::all();
        $pageTitle = "Collections List";
        $addlink = route('collections.create');
        return view('collections.index', compact('collections', 'pageTitle','addlink'));
    }

    /**
     * Show the form for creating a new collection.
     */
    public function create()
    {
        $pageTitle = "Create New Collection";
        return view('collections.create', compact('pageTitle'));
    }

    /**
     * Store a newly created collection in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:collections,name',
            'background_image' => 'required_if:existing_image,null|image|mimes:jpg,jpeg,png|max:1024',
            'target_link' => 'nullable|url',
        ]);

        try {
            if ($request->hasFile('background_image')) {
                $validatedData['background_image'] = $request->file('background_image')->store('background_images', 'public');
            }

            Collection::create($validatedData);

            return redirect()->route('collections.index')->with('success', 'Collection created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create collection.']);
        }
    }

    /**
     * Show the form for editing the specified collection.
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        $pageTitle = "Edit Collection";
        return view('collections.create', compact('collection', 'pageTitle'));
    }

    /**
     * Update the specified collection in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:collections,name,' . $id,
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'target_link' => 'nullable|url',
        ]);

        try {
            $collection = Collection::findOrFail($id);

            if ($request->hasFile('background_image')) {
                // Delete the old image
                if ($collection->background_image) {
                    Storage::disk('public')->delete($collection->background_image);
                }

                $validatedData['background_image'] = $request->file('background_image')->store('background_images', 'public');
            }

            $collection->update($validatedData);

            return redirect()->route('collections.index')->with('success', 'Collection updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update collection.']);
        }
    }

    /**
     * Remove the specified collection from storage.
     */

public function destroy($id)
{
    try {
        // Find the collection by ID
        $collection = Collection::findOrFail($id);

        // Delete the file from storage if it exists
        if ($collection->background_image) {
            Storage::disk('public')->delete($collection->background_image);
        }

        // Delete the collection record
        $collection->delete();

        return redirect()->route('collections.index')->with('success', 'Collection deleted successfully.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Failed to delete collection.']);
    }
}
}
