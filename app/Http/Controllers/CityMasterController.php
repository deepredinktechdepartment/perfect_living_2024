<?php
// app/Http/Controllers/CityMasterController.php
namespace App\Http\Controllers;

use App\Models\CityMaster;
use Illuminate\Http\Request;

class CityMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cities = CityMaster::all();
            $pageTitle = "City Masters List";
            $addlink = route('city-masters.create');
            return view('citymasters.index', compact('cities', 'pageTitle', 'addlink'));
        } catch (\Exception $e) {
            return redirect()->route('city-masters.index')->with('error', 'Failed to fetch cities.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = "Create New City";
        return view('citymasters.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:city_masters,name',
            ]);

            CityMaster::create($request->all());

            return redirect()->route('city-masters.index')->with('success', 'City created successfully.');
        } catch (\Exception $e) {

            return redirect()->route('city-masters.create')->with('error', 'Failed to create city.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $city = CityMaster::findOrFail($id);
            $pageTitle = "Edit City";
            return view('citymasters.create', compact('city', 'pageTitle'));
        } catch (\Exception $e) {
            return redirect()->route('city-masters.index')->with('error', 'City not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $city = CityMaster::findOrFail($id);
            $city->update($request->all());

            return redirect()->route('city-masters.index')->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('city-masters.edit', $id)->with('error', 'Failed to update city.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $city = CityMaster::findOrFail($id);
            $city->delete();

            return redirect()->route('city-masters.index')->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('city-masters.index')->with('error', 'Failed to delete city.');
        }
    }
}
