<?php
// app/View/Components/ApprovedReviews.php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Review;

class ApprovedReviews extends Component
{
    public $reviews;
    public $totalCount; // Property to hold total count of reviews
    public $projectId;
    public $limit;
    public $projectName; // Add project name property

    public function __construct($projectId, $projectName, $limit = 4)
    {
        $this->projectId = $projectId;
        $this->limit = $limit;
        $this->projectName = $projectName; // Initialize project name
        $this->totalCount = $this->getTotalApprovedReviews(); // Get total approved reviews
    }

    public function render()
    {
        // Eloquent query to get approved reviews for the project
        $query = Review::where('project_id', $this->projectId)
            ->where('approval_status', true) // Assuming there's an `approval_status` field
            ->orderBy('created_at', 'desc');

        // Determine if we should paginate or get all records
        $this->reviews = ($this->limit == -1) ? $query->get() : $query->paginate($this->limit);

        return view('components.approved-reviews');
    }

    protected function getTotalApprovedReviews()
    {
        return Review::where('project_id', $this->projectId)
            ->where('approval_status', true) // Assuming there's an `approval_status` field
            ->count(); // Count total approved reviews
    }
}
