<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Crypt;
use App\Models\Project;

class ReviewController extends Controller
{


public function create(Request $request)
{
    try {
        // Default projectId is 0
        $projectId = 0;

        // Check if projectId is provided in the request
        if ($request->has('projectId')) {
            try {
                // Attempt to decrypt the provided projectId
                $decryptedProjectId = Crypt::decryptString($request->projectId);


                // Check if the decrypted projectId is valid
                if ($this->isProjectIdValid($decryptedProjectId)) {
                    $projectId = $decryptedProjectId;
                }
            } catch (Exception $e) {
                // Log the decryption failure

            }
        }

        // Return the view for the form with the projectId
        $project = Project::find($projectId);
        $projectName=$project->name??'';

        $pageTitle="Review for ".$projectName;
        return view('frontend.reviews.form', compact('projectId','pageTitle'));

    } catch (Exception $e) {
        // Log unexpected errors


        // Return an error message to the user
        return redirect()->back()->with('error', 'An unexpected error occurred while trying to load the form.');
    }
}

protected function isProjectIdValid($projectId)
{
    // Assuming you have a method to check the validity of the projectId
    // You can replace this with actual validation logic
    return is_numeric($projectId) && $projectId > 0;
}

    public function store(Request $request)
    {
        try {
            $request->validate([
                'star_rating' => 'required|integer|between:1,5',
                'review' => 'required|string|max:1000',
            ]);

            Review::create([
                'user_id' => Auth::id()??0,
                'project_id' => $request->project_id ?? 0,
                'star_rating' => $request->star_rating ?? 0,
                'review' => $request->review ?? '',
                'reviewed_on' => now(),
                'ip_address' => $request->ip(),
            ]);

            return redirect()->back()->with('success', 'Your review has been submitted.');
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
            $reviews = Review::with('project')->get(); // Get all reviews, adjust query if necessary

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
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Update the approval status based on the request
        if ($request->has('approve') && $request->approve == 1) {
            $review->approval_status = 1;
            $message = 'Review approved successfully!';
        } else {
            $review->approval_status = 0;
            $message = 'Review disapproved successfully!';
        }

        // Update who approved the review and when
        $review->approved_by = Auth::id();
        $review->approved_on = now();
        $review->save();

        // Return a JSON response with success message
        return response()->json([
            'success' => true,
            'message' => $message
        ]);

    } catch (ModelNotFoundException $e) {
        // Return a JSON response if the review is not found
        return response()->json([
            'success' => false,
            'message' => 'Review not found.'
        ], 404);

    } catch (QueryException $e) {
        // Return a JSON response if there is a query error
        return response()->json([
            'success' => false,
            'message' => 'There was an error updating the review.'
        ], 500);

    } catch (Exception $e) {
        // Return a JSON response for any other exceptions
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.'
        ], 500);
    }
}


    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('reviews.index')->with('error', 'Review not found.');
        } catch (QueryException $e) {
            return redirect()->route('reviews.index')->with('error', 'There was an error deleting the review.');
        } catch (Exception $e) {
            return redirect()->route('reviews.index')->with('error', 'An unexpected error occurred.');
        }
    }


    public function showReviews(Request $request)
{
    try {
        // Attempt to decrypt the provided projectId from the request
        $decryptedProjectId = Crypt::decryptString($request->projectId);

        // Check if the decrypted projectId is valid
        if ($this->isProjectIdValid($decryptedProjectId)) {
            $projectId = $decryptedProjectId;
        } else {
            throw new Exception('Invalid project ID.');
        }

        // Fetch approved reviews
        $approvedReviews = Review::where('project_id', $projectId)
                                 ->where('approval_status', true)
                                 ->orderBy('created_at', 'desc')
                                 ->get();





        // Return the view with the reviews
        return view('frontend.reviews.index', compact('approvedReviews'));

    } catch (Exception $e) {
        // Log the exception


        // Optionally, redirect to an error page or display an error message

        return redirect()->back()->with('error', 'Unable to fetch reviews at the moment.');
    }
}

}
