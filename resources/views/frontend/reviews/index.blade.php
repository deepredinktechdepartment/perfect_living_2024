<!-- resources/views/reviews/index.blade.php -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
@section('pageTitle', $pageTitle)
<section class="reviews-section">
    <div class="container">
        {{-- <h3 class="text-left mb-4">Reviews for this Project</h3> --}}

                <div class="mb-sm-3">
        <h1 class="mb-sm-0">{{ $pageTitle ?? '' }}</h1>
                </div>



 <!-- For all reviews -->

    <x-approved-reviews :projectId="$project->id" :projectName="$project->name" :limit="10000" />





    </div>
</section>
@endsection