
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<div>
    <div class="main_bg">
      <div class="col-lg-6 col-md-8 col-12">
        <div class="container">
            <form>
              <!-- <input type="text" class="form-control" placeholder="Search Locality / Builder or Project" /> -->
              <label for="categorySelect" class="form-label">Category and Subcategory</label>
                <select class="form-select" id="categorySelect" aria-label="Category and Subcategory select">
                <option selected>Choose Category</option>
                <!-- Category 1 with Subcategories -->
                <optgroup label="Category 1">
                    <option value="1.1">Subcategory 1.1</option>
                    <option value="1.2">Subcategory 1.2</option>
                    <option value="1.3">Subcategory 1.3</option>
                </optgroup>
                <!-- Category 2 with Subcategories -->
                <optgroup label="Category 2">
                    <option value="2.1">Subcategory 2.1</option>
                    <option value="2.2">Subcategory 2.2</option>
                </optgroup>
                <!-- Category 3 with Subcategories -->
                <optgroup label="Category 3">
                    <option value="3.1">Subcategory 3.1</option>
                    <option value="3.2">Subcategory 3.2</option>
                    <option value="3.3">Subcategory 3.3</option>
                </optgroup>
                </select>
            </form>
        </div>
      </div>
    </div>
    @if ($projects->count() > 0)
    <section>
        <div class="container">

                <h2 class="mb-4 text-center">Top Featured Properties</h2>
                <div class="featured-properties-slider">
                    @foreach ($projects as $project)
                        @php
                            // Default placeholder image URL
                            $defaultImageUrl = 'https://via.placeholder.com/150';

                            // Check if elevationPictures is set and contains at least one image
                            $imageUrl = $defaultImageUrl; // Default image

                            if (isset($project->elevationPictures) && $project->elevationPictures->isNotEmpty()) {
                                $firstImagePath = $project->elevationPictures->first()->file_path;

                                $fullImagePath = URL::to(env('APP_STORAGE').$firstImagePath);



                            }
                        @endphp

                        <x-project-card
                            :name="$project->name"
                            :address="$project->name . ',' . $project->company->name"
                            :details="$project->project_type . ' , ' . $project->no_of_units . ' units'"
                            :price="'₹' . number_format($project->price_per_sft) . ' per sqft'"
                            :image="$fullImagePath??'#'"
                            :url="URL::to('company/project/'.$project->slug)"
                        />
                    @endforeach
                </div>

        </div>
    </section>

    @else

    @endif






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
              <div class="row three_slider">
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
