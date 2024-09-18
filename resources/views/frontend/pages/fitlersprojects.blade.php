
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div>
                            <h5 class="mb-0">Assetz Marq 2</h5>
                        </div>
                        <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                        <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
