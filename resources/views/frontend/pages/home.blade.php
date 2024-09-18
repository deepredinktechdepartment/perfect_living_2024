
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<div>
    <div class="main_bg">
      <div class="col-lg-6 col-md-8 col-12">
        <div class="container">
            <form>
              <input type="text" class="form-control" placeholder="Search Locality / Builder or Project" />
            </form>
        </div>
      </div>
    </div>

    <section>
        <div class="container">
            <h2 class="mb-4 text-center">Top Featured Properties</h2>
            <div class="featured-properties-slider">
              <div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 1</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 2</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
              <div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 3</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 4</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
              <div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 1</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 2</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
              <div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 3</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="project-card-wrapper m-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="row">
                            <div class="col-sm-5 pe-sm-0">
                                <div class="project-image-wrapper h-100">
                                    <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="project-details-wrapper h-100 p-3">
                                    <h5 class="mb-0">Assetz Marq 4</h5>
                                    <p> Kannamangala, Bangalore</p>
                                    <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                                    <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
            </div>
        </div>
    </section>

    <section class="home_tab_sec">
      <div class="container">
          <h2 class="mb-4 text-center">EXPLORE PERFECT LIVING TOP PICKS</h2>

          <ul class="nav nav-pills mb-3 d-flex gap-2 justify-content-lg-between border-bottom mb-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-tab1-tab" data-bs-toggle="pill" data-bs-target="#pills-tab1" type="button" role="tab" aria-controls="pills-tab1" aria-selected="true">Affordable Homes</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-tab2-tab" data-bs-toggle="pill" data-bs-target="#pills-tab2" type="button" role="tab" aria-controls="pills-tab2" aria-selected="false">Luxury Homes</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-tab3-tab" data-bs-toggle="pill" data-bs-target="#pills-tab3" type="button" role="tab" aria-controls="pills-tab3" aria-selected="false">Ready to Occupy</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-tab4-tab" data-bs-toggle="pill" data-bs-target="#pills-tab4" type="button" role="tab" aria-controls="pills-tab4" aria-selected="false">Plotted Development</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-tab5-tab" data-bs-toggle="pill" data-bs-target="#pills-tab5" type="button" role="tab" aria-controls="pills-tab5" aria-selected="false">Opcoming Projects</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab1-tab">
              <div class="row">
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab2" role="tabpanel" aria-labelledby="pills-tab2-tab">
              <div class="row">
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab3" role="tabpanel" aria-labelledby="pills-tab3-tab">
              <div class="row">
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab4" role="tabpanel" aria-labelledby="pills-tab4-tab">
              <div class="row">
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-tab5" role="tabpanel" aria-labelledby="pills-tab5-tab">
              <div class="row">
                <div class="col-sm-4">
                    <div class="project-card-wrapper">
                        <a href="#" class="text-decoration-none">
                        <div class="project-image-wrapper h-100">
                            <img src="{{ URL::to('assets/website/img/project.jpg') }}" alt="Project Title" class="img-fluid project-image h-100">
                        </div>
                        <div class="project-details-wrapper h-100 p-3">
                            <h5 class="mb-0">Assetz Marq 2</h5>
                            <p> Kannamangala, Bangalore</p>
                            <p>3 BHK Apartment <br> 1366 - 1600 sqft</p>
                            <p class="mb-0"> <span class="price-info">₹90.0 L*</span> <small>Onwards</small></p>
                        </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
</div>



@endsection
