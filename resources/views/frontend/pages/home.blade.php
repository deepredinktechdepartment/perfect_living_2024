
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
            <h2 class="mb-4 pb-sm-2 text-center">Featured Gated Communities in Hyderabad</h2>
            <div class="featured-properties-slider"> <!-- Remove row from here -->
                @foreach ($projects->chunk(4) as $projectChunk) <!-- Group 4 projects per slide -->
                    <div class="slide"> <!-- Each slide contains 4 projects -->
                        <div class="row">
                            @foreach ($projectChunk as $project)
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

                                <div class="col-md-6"> <!-- 6 columns, 2 cards per row -->
                                    <x-project-card
                                        :name="$project->name"
                                        :address="$project->areas->name"
                                        :details="formatBeds($project->unitConfigurations)"
                                        :projecttype="$project->project_type"
                                        :price="number_format($project->price_per_sft)"
                                        :image="$fullImagePath ?? '#'"
                                        :url="URL::to('project/'.$project->slug)"
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif





@php
// Group projects by project_type
$groupedProjects = $projects->groupBy('project_type')->sortKeys();
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
                    <div class="projects-slider">
                        @foreach($projects->chunk(6) as $projectChunk) <!-- Each slide contains 6 projects -->
                            <div class="slide">
                                <div class="row">
                                    @foreach($projectChunk as $project)
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

                                        <div class="col-md-4 mb-4"> <!-- 3 cards per row on large screens -->
                                            <div class="card_two h-100">
                                                <div class="project-card-wrapper h-100">
                                                    <a href="{{ URL::to('project/'.$project->slug) }}" class="text-decoration-none">
                                                        <div class="project-image-wrapper">
                                                            <img src="{{ $fullImagePath ?? $defaultImageUrl }}" alt="{{ $project->name }}" class="img-fluid project-image">
                                                        </div>
                                                        <div class="project-details-wrapper p-3">
                                                            <h5 class="mb-0">{{ $project->name }}</h5>
                                                            <p class="mb-1 pb-0"><i class="fa-solid fa-location-dot mb-1 pb-0"></i> {{ $project->areas->name ?? '' }}</p>
                                                            <p class="mb-0 pb-0">{{ formatBeds($project->unitConfigurations) }}</p>
                                                            <p class="mb-0 pb-0">{{ $project->project_type??'' }}</p>
                                                            @if(isset($project->price_per_sft) && $project->price_per_sft > 0)
                                                                <p class="mb-0"><span class="price-info">₹{{ $project->price_per_sft }} per sq.ft</span> <small>Onwards</small></p>
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
            @endforeach
        </div>
    </div>
</section>








</div>


<!-- Cookie Modal -->
<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header border-bottom-0 pb-2 pt-4 justify-content-center">
              <h3 class="modal-title text-brand" id="cookieModalLabel">Disclaimer</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-sm-4 mx-sm-2">
              <p>
                  All information present on <a href="{{ URL::to('') }}">perfectliving.in</a> has been made available for informational purposes only.
                  No representation or warranty is expressly or impliedly given as to its accuracy. Any investment decisions
                  that you take should not be based relying solely on the information that is available on <a href="{{ URL::to('') }}">perfectliving.in</a> or
                  on any secondary source of information that relies on data downloaded from <a href="{{ URL::to('') }}">perfectliving.in</a>.
              </p>
              <p>
                  Nothing contained herein shall be deemed to constitute legal advice, solicitation, or invitation to acquire
                  by the developer/builder or any other entity. You are advised to visit the relevant RERA website and contact
                  builder/advertisers directly to know more about the project before taking any decision based on the contents
                  displayed on the website <a href="{{ URL::to('') }}">perfectliving.in</a>.
              </p>
              <p>
                  Owners or the representatives of the projects can reach out to <a href="mailto:info@perfectliving.in" class="text-brand">info@perfectliving.in</a> to rectify any factually
                  incorrect information pertaining to their own projects. All customer reviews expressed on this website are
                  subject to review and approval.
              </p>
              <p>
                  <a href="{{ URL::to('') }}">perfectliving.in</a> may set cookies or track your activity to provide you with personalized content, and your
                  usage of the site is deemed as consent to set tracking cookies. Trademarks belong to the respective owners.
              </p>
          </div>
          <div class="modal-footer cookie-modal-footer border-top-0 pb-4 pt-0 justify-content-center">
              <button type="button" class="btn btn-success accept-cookies" style="width: 100%; max-width: 200px;">
                  Accept
              </button>
          </div>
      </div>
  </div>
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


  <!-- Triggering the Modal on Page Load if Cookie is not Set -->
  <script>
    // Function to set a cookie
    function setCookie(cname, cvalue, exdays) {
      const d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000)); // Cookie expiry in days
      let expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    // Function to get a cookie by name
    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }



  </script>

<!-- JavaScript for Cookie Acceptance -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Check if the modal should be shown based on cookie acceptance
      const cookieAccepted = document.cookie.split(';').some((item) => item.trim().startsWith('cookiesAccepted='));
      if (!cookieAccepted) {
          const cookieModal = new bootstrap.Modal(document.getElementById('cookieModal'));
          cookieModal.show();
      }

      // Use class to add event listener
      document.querySelector('.accept-cookies').addEventListener('click', function () {
          // Logic to handle cookie acceptance
          document.cookie = "cookiesAccepted=true; max-age=31536000"; // 1 year expiration
          console.log('Cookies accepted'); // Debugging log
          const modal = bootstrap.Modal.getInstance(document.getElementById('cookieModal'));
          modal.hide(); // Hide the modal
      });
  });
</script>

@endpush





@endsection
