<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function index()
    {

        try {


            $wishlists = Wishlist::where('user_id', Auth::id())->with('project')->get();
            $projects = $wishlists->pluck('project'); // Get the projects from the wishlist
            $pageTitle = 'My Short lists';



            return view('frontend.wishlists.index', compact('wishlists','projects','pageTitle'));
        } catch (\Exception $e) {
            Log::error('Error fetching wishlists: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to fetch wishlists. Please try again later.']);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);

        try {
            // Check if the project already exists in the user's wishlist
            $exists = Wishlist::where('user_id', Auth::id())
                        ->where('project_id', $request->project_id)
                        ->exists();

            if ($exists) {
                return redirect()->back()->withErrors(['error' => 'This project is already in your Short list.']);
            }

            // Create a new wishlist entry
            Wishlist::create([
                'user_id' => Auth::id(),
                'project_id' => $request->project_id,
            ]);

            return redirect()->back()->with('success', 'Project added to Short list.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Unable to add project to Short list. Please try again later.']);
        }
    }


    public function destroy($id)
    {
        try {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('project_id', $id)->first();
            if ($wishlist) {
                $wishlist->delete();
                return redirect()->back()->with('success', 'Project removed from Short list.');
            } else {
                return redirect()->back()->withErrors(['error' => 'Project not found in Short list.']);
            }
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Unable to remove project from Short list. Please try again later.']);
        }
    }
}
