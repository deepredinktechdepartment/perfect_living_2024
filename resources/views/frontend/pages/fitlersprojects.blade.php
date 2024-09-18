
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<section>
    <div class="container filter_bg">
        <div class="row py-2 bg-dark-grey align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">(1653 Properties Available)</p>
                <div class="col-lg-2"> 
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Relevance</option>
                        <option value="1">Price(Inc)</option>
                        <option value="1">Price(Dec)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row py-2 mb-3 bg-grey align-items-center">
            <div class="col-lg-2"> 
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select Type</option>
                    <option value="1">New</option>
                    <option value="2">Resale</option>
                </select>
            </div>
            <div class="col-lg-3"> 
                <select class="form-select" aria-label="Default select example">
                    <option selected>Budget</option>
                    <option value="1">₹1.00 Cr* - ₹2.00 Cr*</option>
                    <option value="2">₹3.00 Cr* - ₹4.00 Cr*</option>
                </select>
            </div>
            <div class="col-lg-2"> 
                <select class="form-select" aria-label="Default select example">
                    <option selected>BHK</option>
                    <option value="1">1 BHK</option>
                    <option value="2">2 BHK</option>
                </select>
            </div>
            <div class="col-lg-2"> 
                <select class="form-select" aria-label="Default select example">
                    <option selected>Property Status</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="col-lg-2"> 
                <select class="form-select" aria-label="Default select example">
                    <option selected>Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Villa">Villa</option>
                    <option value="Plot">Plot</option>
                </select>
            </div>
            <div class="col-lg-1"> 
                <a href="#" class="text-danger text-decoration-none">Clear all</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="project-card-wrapper">
                    <a href="#" class="text-decoration-none">
                    <div class="project-image-wrapper h-100">
                        <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                    </div>
                    <div class="project-details-wrapper h-100 p-3">
                        <div class="">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p><i class="fa-solid fa-location-dot"></i> Kannamangala, Bangalore</p>
                            <h5 class="mb-2">₹1.02 Cr* - ₹1.37 Cr*</h5>
                            <p>3 BHK Apartment 1366 - 1600 sqft</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
