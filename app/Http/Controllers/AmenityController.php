<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|mimes:jpg,jpeg,png|max:1024', // Validate icon file
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;

        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('amenities', 'public');
            $amenity->icon = $iconPath;
        }

        $amenity->save();

        return redirect()->route('amenities.index')->with('success', 'Amenity created successfully.');
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
        $amenity = Amenity::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|mimes:jpg,jpeg,png|max:1024', // Validate icon file, not required if already exists
        ]);

        $amenity->name = $request->name;

        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($amenity->icon && File::exists(storage_path('app/public/' . $amenity->icon))) {
                File::delete(storage_path('app/public/' . $amenity->icon));
            }

            // Store new icon
            $iconPath = $request->file('icon')->store('amenities', 'public');
            $amenity->icon = $iconPath;
        }

        $amenity->save();

        return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');
    }

    /**
     * Remove the specified amenity from storage.
     */
    public function destroy($id)
    {
        // Find the amenity by its ID
        $amenity = Amenity::findOrFail($id);

        // Check if the icon file exists
        if ($amenity->icon && File::exists(storage_path('app/public/' . $amenity->icon))) {
            // Delete the icon file
            File::delete(storage_path('app/public/' . $amenity->icon));
        }

        // Delete the amenity record from the database
        $amenity->delete();

        // Redirect back to the amenities list with a success message
        return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
    }
}
