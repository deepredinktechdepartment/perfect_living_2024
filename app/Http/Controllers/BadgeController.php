<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Display a listing of the badges.
     */
    public function index()
    {
        $badges = Badge::all();
        $pageTitle = "Badges List";
        $addlink = route('badges.create');
        return view('badges.index', compact('badges', 'pageTitle','addlink'));
    }

    /**
     * Show the form for creating a new badge.
     */
    public function create()
    {
        $pageTitle = "Create New Badge";
        return view('badges.create', compact('pageTitle'));
    }

    /**
     * Store a newly created badge in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:badges,name',
        ]);

        try {
            Badge::create($validatedData);
            return redirect()->route('badges.index')->with('success', 'Badge created successfully.');
        } catch (\Exception $e) {

            return back()->withErrors(['error' => 'Failed to create badge.']);
        }
    }

    /**
     * Show the form for editing the specified badge.
     */
    public function edit($id)
    {
        $badge = Badge::findOrFail($id);
        $pageTitle = "Edit Badge";
        return view('badges.create', compact('badge', 'pageTitle'));
    }

    /**
     * Update the specified badge in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:badges,name,' . $id,
        ]);

        try {
            $badge = Badge::findOrFail($id);
            $badge->update($validatedData);
            return redirect()->route('badges.index')->with('success', 'Badge updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update badge.']);
        }
    }

    /**
     * Remove the specified badge from storage.
     */
    public function destroy($id)
    {
        try {
            $badge = Badge::findOrFail($id);
            $badge->delete();
            return redirect()->route('badges.index')->with('success', 'Badge deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete badge.']);
        }
    }
}