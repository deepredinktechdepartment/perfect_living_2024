<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'CMS Dashboard')

@section('content')

@php
       use App\Models\Project;
       $projectCount = Project::count(); // Get total count of projects
       use App\Models\Review;
       $reviewCount = Review::approvalStatus(true)->count(); // Get total count of projects
       use App\Models\Company;
       $builderCount = Company::count(); // Get total count of projects
@endphp

<!-- Page Under Construction Message -->

<!-- Card Components -->

    <div class="row">
        <!-- Card 1 -->

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <x-card
                title="Builders"
                number="{{ $builderCount??0 }}"
                bgColor="bg-danger"
                link="{{ URL::to('companies') }}"
            />
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <x-card
                title="Projects"
                number="{{ $projectCount??0 }}"
                bgColor="bg-success"
                link="{{ URL::to('/projects') }}"
            />
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <x-card
                title="Reviews"
                number="{{ $reviewCount??0 }}"
                bgColor="bg-primary"
                link="{{ URL::to('admin/reviews') }}"
            />
        </div>





    </div>


@endsection
