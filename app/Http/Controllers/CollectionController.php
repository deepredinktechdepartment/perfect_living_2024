<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

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
        ]);

        try {
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
        ]);

        try {
            $collection = Collection::findOrFail($id);
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
            $collection = Collection::findOrFail($id);
            $collection->delete();
            return redirect()->route('collections.index')->with('success', 'Collection deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete collection.']);
        }
    }
}
