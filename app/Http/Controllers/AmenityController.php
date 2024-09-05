<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the amenities.
     */
    public function index()
    {
        $amenities = Amenity::all();
        $pageTitle = "Amenities List";
        $addlink = route('amenities.create');
        return view('amenities.index', compact('amenities', 'pageTitle','addlink'));
    }

    /**
     * Show the form for creating a new amenity.
     */
    public function create()
    {
        $pageTitle = "Create New Amenity";
        return view('amenities.create', compact('pageTitle'));
    }

    /**
     * Store a newly created amenity in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:amenities,name',
        ]);

        try {
            Amenity::create($validatedData);
            return redirect()->route('amenities.index')->with('success', 'Amenity created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create amenity.']);
        }
    }

    /**
     * Show the form for editing the specified amenity.
     */
    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        $pageTitle = "Edit Amenity";
        return view('amenities.create', compact('amenity', 'pageTitle'));
    }

    /**
     * Update the specified amenity in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:amenities,name,' . $id,
        ]);

        try {
            $amenity = Amenity::findOrFail($id);
            $amenity->update($validatedData);
            return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update amenity.']);
        }
    }

    /**
     * Remove the specified amenity from storage.
     */
    public function destroy($id)
    {
        try {
            $amenity = Amenity::findOrFail($id);
            $amenity->delete();
            return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete amenity.']);
        }
    }
}
