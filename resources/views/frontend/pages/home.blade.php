
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<div>



    <div class="main_bg">
      <div class="col-sm-7 col-xl-4 position-relative">
        <div class="container">
            <form id="searchForm" method="GET">
                <div class="d-flex">
                    <input class="form-control" type="search" id="searchInput" placeholder="Search Locality / Builder or Project" aria-label="Search" value="{{ request()->query('search') }}">
                    <button class="btn btn_black" type="submit">Search</button>
                </div>

                <!-- Dropdown for Categories and Subcategories -->
                <ul class="dropdown-menu w-50" id="categoryDropdown" style="display:none;">
                    <li class="dropdown-header">Fruits</li>
                    <li><a class="dropdown-item" href="#" data-category="Category 1" data-value="1.1">Apple</a></li>
                    <li><a class="dropdown-item" href="#" data-category="Category 1" data-value="1.2">Mango</a></li>
                    <li><a class="dropdown-item" href="#" data-category="Category 1" data-value="1.3">Banana</a></li>

                    <li class="dropdown-header">Movies</li>
                    <li><a class="dropdown-item" href="#" data-category="Category 2" data-value="2.1">Leo</a></li>
                    <li><a class="dropdown-item" href="#" data-category="Category 2" data-value="2.2">Spiderman</a></li>
                </ul>
            </form>







        </div>
      </div>
    </div>


    @if ($projects->count() > 0)
    <section>
        <div class="container">
            <h2 class="mb-4 text-center">Featured Gated Communities in Hyderabad</h2>
            <div class="row featured-properties-slider">
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

                        // Check if unitConfigurations is set and contains at least one item
                        $beds = isset($project->unitConfigurations) && $project->unitConfigurations->isNotEmpty()
                            ? $project->unitConfigurations->first()->beds
                            : 'N/A'; // Default value if not available
                    @endphp

                    <div class="col-md-6 mb-4"> <!-- Each card takes half the width (6 columns) -->
                        <x-project-card
                            :name="$project->name"
                            :address="$project->areas->name"
                            :details="$project->project_type . ', ' . $beds . ' BHK'"
                            :price="number_format($project->price_per_sft)"
                            :image="$fullImagePath ?? '#'"
                            :url="URL::to('project/'.$project->slug)"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif








    @php
    // Group projects by project_type
    $groupedProjects = $projects->groupBy('project_type');
@endphp

<section class="home_tab_sec pt-0">
  <div class="container">
      <h2 class="mb-4 pb-sm-3 text-center">Explore Perfect Living Top Picks</h2>

      <!-- Nav Pills for Tabs with margin between items -->
      <ul class="nav nav-pills mb-3 border-bottom mb-5 flex-nowrap overflow-auto" id="pills-tab" role="tablist">
          @foreach($groupedProjects as $type => $projects)
              <li class="nav-item" role="presentation">
                  <button class="nav-link {{ $loop->first ? 'active' : '' }} me-2" id="pills-tab{{ $loop->index + 1 }}-tab" data-bs-toggle="pill" data-bs-target="#pills-tab{{ $loop->index + 1 }}" type="button" role="tab" aria-controls="pills-tab{{ $loop->index + 1 }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $type }}</button>
              </li>
          @endforeach
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="pills-tabContent">
          @foreach($groupedProjects as $type => $projects)
              <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-tab{{ $loop->index + 1 }}" role="tabpanel" aria-labelledby="pills-tab{{ $loop->index + 1 }}-tab">
                  <div class="row">
                      @foreach($projects as $project)
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

                          <div class="col-sm-4 mb-4">
                              <div class="card_two h-100">
                                <div class="project-card-wrapper h-100">
                                    <a href="{{ URL::to('project/'.$project->slug) }}" class="text-decoration-none">
                                        <div class="project-image-wrapper">
                                            <img src="{{ $fullImagePath ?? $defaultImageUrl }}" alt="{{ $project->name }}" class="img-fluid project-image">
                                        </div>
                                        <div class="project-details-wrapper p-3">
                                            <h5 class="mb-0">{{ $project->name }}</h5>
                                            <p  class="mb-1 pb-0"><i class="fa-solid fa-location-dot mb-1 pb-0"></i> {{ $project->areas->name ?? '' }}</p>
                                            <p class="mb-0 pb-0">{{ $project->project_type }}, {{ $project->unitConfigurations->first()->beds??'' }} BHK</p>
                                            @if(isset($project->price_per_sft) && $project->price_per_sft > 0)
                                            <p class="mb-0"> <span class="price-info">₹{{ $project->price_per_sft }} per sq.ft</span> <small>Onwards</small></p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</section>






</div>

@push('scripts')

<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(event) {
            // Prevent default form submission to modify action
            event.preventDefault();

            // Get the search input value
            var searchInput = $('#searchInput').val().trim();

            // If the search input is not empty, set the form action
            if (searchInput) {
                // Set the base URL using PHP's URL::to in a Blade template
                var baseUrl = "{{ URL::to('search') }}";

                // Change the form action to baseUrl/searchInput
                this.action = baseUrl + "/" + encodeURIComponent(searchInput);
            } else {
                // If searchInput is empty, set action to baseUrl to prevent any issues
                this.action = "{{ URL::to('search') }}";
            }

            // Submit the form with the new action
            this.submit();
        });
    });
</script>
@endpush

@endsection
