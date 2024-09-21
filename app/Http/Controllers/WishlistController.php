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
            return view('frontend.wishlists.index', compact('wishlists'));
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
            Wishlist::create([
                'user_id' => Auth::id(),
                'project_id' => $request->project_id,
            ]);
            return redirect()->back()->with('success', 'Project added to wishlist.');
        } catch (\Exception $e) {
            Log::error('Error adding project to wishlist: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to add project to wishlist. Please try again later.']);
        }
    }

    public function destroy($id)
    {
        try {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('project_id', $id)->first();
            if ($wishlist) {
                $wishlist->delete();
                return redirect()->back()->with('success', 'Project removed from wishlist.');
            } else {
                return redirect()->back()->withErrors(['error' => 'Project not found in wishlist.']);
            }
        } catch (\Exception $e) {
            Log::error('Error removing project from wishlist: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Unable to remove project from wishlist. Please try again later.']);
        }
    }
}
