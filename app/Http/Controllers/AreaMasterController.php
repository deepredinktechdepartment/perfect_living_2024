<?php

namespace App\Http\Controllers;

use App\Models\AreaMaster;
use Illuminate\Http\Request;
use App\Models\CityMaster;

class AreaMasterController extends Controller
{
    /**
     * Display a listing of the area masters.
     */

     protected $cities;

     public function __construct()
     {
         // Fetch all cities and share with views
         $this->cities = CityMaster::all();
         view()->share('cities', $this->cities);
     }

    public function index()
    {

        $areas = AreaMaster::with('city')->get();
        $pageTitle = "Area Masters List";
        $addlink = route('area-masters.create');
        return view('area_masters.index', compact('areas', 'pageTitle','addlink'));
    }

    /**
     * Show the form for creating a new area master.
     */
    public function create()
    {
        $pageTitle = "Create New Area Master";
        return view('area_masters.create', compact('pageTitle'));
    }

    /**
     * Store a newly created area master in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|unique:area_masters,name',
            'city_id' => 'required|exists:city_masters,id', // Validate that city_id exists in the city_masters table
        ]);

        try {
            // Create a new AreaMaster with the validated data
            AreaMaster::create($validatedData);

            // Redirect back to the index page with a success message
            return redirect()->route('area-masters.index')->with('success', 'Area Master created successfully.');
        } catch (\Exception $e) {
            // Handle any errors and redirect back with an error message
            return back()->withErrors(['error' => 'Failed to create area master.']);
        }
    }


    /**
     * Show the form for editing the specified area master.
     */
    public function edit($id)
    {
        $area = AreaMaster::findOrFail($id);
        $pageTitle = "Edit Area Master";
        return view('area_masters.create', compact('area', 'pageTitle'));
    }

    /**
     * Update the specified area master in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|unique:area_masters,name,' . $id,
            'city_id' => 'required|exists:city_masters,id', // Validate that city_id exists in the city_masters table
        ]);

        try {
            // Find the area by ID, or fail if not found
            $area = AreaMaster::findOrFail($id);

            // Update the area with the validated data
            $area->update($validatedData);

            // Redirect back to the index page with a success message
            return redirect()->route('area-masters.index')->with('success', 'Area Master updated successfully.');
        } catch (\Exception $e) {
            // Handle any errors and redirect back with an error message
            return back()->withErrors(['error' => 'Failed to update area master.']);
        }
    }


    /**
     * Remove the specified area master from storage.
     */
    public function destroy($id)
    {
        try {
            $area = AreaMaster::findOrFail($id);
            $area->delete();
            return redirect()->route('area-masters.index')->with('success', 'Area Master deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete area master.']);
        }
    }
}
