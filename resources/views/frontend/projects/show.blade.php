<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 order-sm-0 order-2">
        <div class="mb-sm-3">
        <h1>{{ $project->name ?? '' }}</h1>
        @if(isset($project->company) && !empty($project->company->name))
            <h5>By <span class="text-decoration-underline">{{ $project->company->name }}</span></h5>
        @endif
       

          @if(isset($project->areas) && !empty($project->areas->name))
          <h6>{{$project->areas->name??''}} - {{$project->citites->name??''}}</h6>
          @endif
        </div>
      </div>
      <div class="col-sm-4 order-sm-0 order-3">
        <div class="rating-display-wrapper text-sm-center">
          <div class="star-rating text-sm-center text-start">
            <span class="star" data-value="5">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="1">&#9733;</span>
        </div>
          <div>
            <ul class="inline-links justify-content-sm-center">
              <li><a href="" class="text-black">12 Reviews</a></li>
              <li><a href="" class="text-black">Write a review</a></li>
            </ul>
          </div>
        </div>
        
      </div>
     
      
      <div class="col-sm-8 order-sm-0 order-1">
    <div class="project-overview-images-wrapper mb-sm-0 mb-3">
        @if(isset($project->elevationPictures) && $project->elevationPictures->isNotEmpty())
            @php
                // Get the latest elevation picture
                $filePath = env('APP_STORAGE').$project->elevationPictures[0]->file_path;
            @endphp

            @if(File::exists($filePath))
                <img src="{{ URL::to($filePath) }}" alt="" class="img-fluid">
            @else
                <!-- Show empty if file does not exist -->
                <div class="img-placeholder"></div>
            @endif
        @else
            <!-- Show empty if there are no elevation pictures -->
            <div class="img-placeholder"></div>
        @endif
    </div>
</div>



@if(isset($project->site_address) && strpos($project->site_address, 'https://www.google.com/maps/embed') !== false)
    <div class="col-sm-4 order-sm-0 order-4">
        <div class="h-100">
            <iframe src="{{ $project->site_address??'#' }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endif


  </div>

  
  
  <!-- resources/views/your-view.blade.php -->


<div class="row mt-4 align-items-center">
    @if($badges->isNotEmpty())
        @foreach($badges as $badge)
            <x-feature-item 
                :imageSrc="URL::to(env('APP_STORAGE').'icons/'.$badge->icon)" 
                :altText="$badge->name??''" 
                :title="$badge->name??''" 
                :imageWidth="'40'" 
            />
        @endforeach
    @else
    
    @endif
</div>


  <hr>
</div>
</section>

@if($groupedConfigurations && count($groupedConfigurations) > 0)
<section class="pt-0">
    <div class="container">
        <h2 class="mb-4">Floor plans</h2>
        <div class="customised-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($groupedConfigurations as $key => $configurations)
                    @php
                        // Sanitize the key to create a valid ID
                        $safeKey = preg_replace('/[^a-zA-Z0-9_-]/', '', $key);

                        // Map numbers to words
                        $numberToWord = [
                            1 => 'one',
                            2 => 'two',
                            3 => 'three',
                            4 => 'four',
                            5 => 'five',
                            6 => 'six',
                            7 => 'seven',
                            8 => 'eight',
                            9 => 'nine',
                            10 => 'ten'
                        ];

                        $formattedKey = $numberToWord[(int)$key] ?? $key; // Default to key if not in mapping
                        $withoutformattedKey = $key; // Default to key if not in mapping
                        $tabId = strtolower($formattedKey) . 'bhk'; // Convert to lowercase for tab ID
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $tabId }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tabId }}" type="button" role="tab" aria-controls="{{ $tabId }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ ucfirst($withoutformattedKey) }} BHK
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($groupedConfigurations as $key => $configurations)
                    @php
                        $formattedKey = $numberToWord[(int)$key] ?? $key; // Default to key if not in mapping
                        $withoutformattedKey = $key; // Default to key if not in mapping
                        $tabId = strtolower($formattedKey) . 'bhk'; // Convert to lowercase for tab ID
                    @endphp
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $tabId }}" role="tabpanel" aria-labelledby="{{ $tabId }}-tab">
                        <div class="floorplans-slider row mt-4">
                            @foreach($configurations as $configuration)
                                <x-floor-plan-item 
                                    :image_path="URL::to(env('APP_STORAGE') . '/' . $configuration['floor_plan'])" 
                                    :description="$withoutformattedKey . ' BHK ' . $configuration['facing']" 
                                    :size="$configuration['unit_size']" 
                                />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif






<section class="pt-4">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 pe-sm-5 border-end">
        <div class="mb-sm-0 mb-5">
          <h2 class="mb-sm-5 mb-3">About {{$project->name??''}}</h2>
     
     {!!$project->about_project??''!!}
        </div>
      </div>
      <div class="col-sm-4 ps-sm-4">
        <div>
          <h2 class="mb-sm-5 mb-3">About The Builder</h2>
          <ul class="custom-list">
            <li>Founded: 1995</li>
            <li>Completed 25 projects</li>
          </ul>
          <p class="mb-1"><b>Highlights</b></p>
          <ul class="custom-list">
            <li>Built first mixed use commercial property of Hyderabad</li>
            <li>Built the first LEED Platinum certified residential proprety in Hyderabad</li>
          </ul>
          <p>Own this property? <a href="">Tell us the facts!in</a></p>
        </div>
      </div>
    </div>
    
    
    <!-- resources/views/your-view.blade.php -->

<div class="highlights-images-slider row mt-4">
    @if($highlightImages->isNotEmpty())
        @foreach($highlightImages as $image)
            <x-projectcollections 
                :imageSrc="URL::to(env('APP_STORAGE').''.$image->background_image)" 
                :altText="$image->name" 
                :description="$image->name" 
                :link="$image->target_link" 
            />
        @endforeach
    @else
      
    @endif
</div>



    
    
  </div>
</section>

<section class="footer-before-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
          <ul class="footer-links-list">
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum isissf35dg</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
          <ul class="footer-links-list">
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum isissf35dg</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
          <ul class="footer-links-list">
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum isissf35dg</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-logo mt-sm-0 mt-3">
          <img src="{{URL::to('assets/website/img/logo.png')}}" alt="The Perfect Living" class="img-fluid mb-sm-4 mb-2">
          <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>
        <div class="social-links mt-4 pt-2">
          <ul>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
   
@endsection