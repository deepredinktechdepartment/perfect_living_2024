<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'CMS Dashboard')

@section('content')

@php
       use App\Models\Project;
       $projectCount = Project::count(); // Get total count of projects
       use App\Models\Review;
       $reviewCount = Review::approvalStatus(true)->count(); // Get total count of projects
@endphp

<!-- Page Under Construction Message -->

<!-- Card Components -->

    <div class="row">
        <!-- Card 1 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <x-card
                title="Projects"
                number="{{ $projectCount }}"
                bgColor="bg-success"
                link="{{ url('/projects') }}"
            />
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <x-card
                title="Reviews"
                number="{{ $reviewCount }}"
                bgColor="bg-primary"
                link="{{ url('admin/reviews') }}"
            />
        </div>


    </div>


@endsection
