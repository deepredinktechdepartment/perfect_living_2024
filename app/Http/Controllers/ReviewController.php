<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;

class ReviewController extends Controller
{
    public function create()
    {
        return view('frontend.reviews.form');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'star_rating' => 'required|integer|between:1,5',
                'review' => 'required|string|max:1000',
            ]);

            Review::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id ?? 1,
                'star_rating' => $request->star_rating ?? 1,
                'review' => $request->review ?? '',
                'reviewed_on' => now(),
                'ip_address' => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Your review has been submitted and is pending approval.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'There was an error processing your review.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    public function index()
    {
        try {
            $reviews = Review::get(); // Get all reviews, adjust query if necessary
            $pageTitle = "Reviews";
            return view('reviews.index', compact('reviews', 'pageTitle'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching reviews.');
        }
    }

    public function approve(Review $review)
    {
        try {
            $review->update([
                'approval_status' => true,
                'approved_by' => Auth::id(),
                'approved_on' => now(),
            ]);

            return redirect()->route('admin.reviews.index')->with('success', 'Review approved successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.reviews.index')->with('error', 'Review not found.');
        } catch (QueryException $e) {
            return redirect()->route('admin.reviews.index')->with('error', 'There was an error updating the review.');
        } catch (Exception $e) {
            return redirect()->route('admin.reviews.index')->with('error', 'An unexpected error occurred.');
        }
    }

    public function toggleApproval(Request $request, $id)
    {
        try {
            $review = Review::findOrFail($id);

            if ($request->has('approve')) {
                $review->approval_status = true;
                $message = 'Review approved successfully!';
            } else {
                $review->approval_status = false;
                $message = 'Review disapproved successfully!';
            }

            $review->save();

            return redirect()->back()->with('success', $message);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Review not found.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'There was an error updating the review.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }
    }

    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('reviews.index')->with('error', 'Review not found.');
        } catch (QueryException $e) {
            return redirect()->route('reviews.index')->with('error', 'There was an error deleting the review.');
        } catch (Exception $e) {
            return redirect()->route('reviews.index')->with('error', 'An unexpected error occurred.');
        }
    }
}
