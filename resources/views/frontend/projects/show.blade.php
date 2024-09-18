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
          {{-- <div class="star-rating text-sm-center text-start">
            <span class="star" data-value="5">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="1">&#9733;</span>
        </div> --}}

        @if($reviews->count() > 0)
              <!-- Display average rating -->
              <div class="star-rating text-sm-center text-start">
                @for ($i = 5; $i >= 1; $i--)
                    <span class="star {{ $roundedRating >= $i ? 'filled' : '' }}" data-value="{{ $i }}">&#9733;</span>
                @endfor
                {{-- <p>Average Rating: {{ $roundedRating }} / 5</p> --}}
            </div>
@else

<div class="star-rating text-sm-center text-start">
    @for ($i = 5; $i >= 1; $i--)
        <span class="star {{ $roundedRating >= $i ? 'filled' : '' }}" data-value="{{ $i }}">&#9733;</span>
    @endfor
    {{-- <p>Average Rating: {{ $roundedRating }} / 5</p> --}}
</div>

            @endif
        <div>
            <ul class="inline-links justify-content-sm-center">
                @if($reviews->count() > 0)
                    <li>
                        <a href="{{ route('reviews.show', ['projectId' => Crypt::encryptString($project->id)]) }}" class="text-black">
                            {{ $reviews->count() }} {{ $reviews->count() === 1 ? 'Review' : 'Reviews' }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('review.create', ['projectId' => Crypt::encryptString($project->id)]) }}" class="text-black">Write a review</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('review.create', ['projectId' => Crypt::encryptString($project->id)]) }}" class="text-black">Write a review</a>
                    </li>
                @endif
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


    <div class="col-sm-8 order-sm-0 order-1">
        <div class="row">
          <div class="col-sm-9 col-12 pe-sm-1 mb-sm-0 mb-2">
            <a href="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" data-fancybox="banner_gallery" data-caption="Botanika">
              <div class="project-overview-images-wrapper h-100">
                  <img src="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" alt="Image 1" class="img-fluid h-100">
              </div>
            </a>
          </div>
          <div class="col-sm-3 col-12 ps-sm-1 d-sm-block d-none">
            <a href="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" data-fancybox="banner_gallery" data-caption="Botanika">
              <div class="project-overview-images-wrapper mb-2">
                  <img src="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" alt="Image 2" class="img-fluid h-100">
              </div>
            </a>
              <a href="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" data-fancybox="banner_gallery" data-caption="Botanika">
              <div class="project-overview-images-wrapper mb-2">
                  <img src="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" alt="Image 3" class="img-fluid h-100">
              </div>
            </a>
              <a href="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" data-fancybox="banner_gallery" data-caption="Botanika">
              <div class="project-overview-images-wrapper">
                  <img src="https://perfectliving.in/storage/app/public/elevation_pictures/KuiuSQvtH0KMWinPROGBEWIlJOlNoz9PIBQtgbCw.jpg" alt="Image 4" class="img-fluid h-100">
              </div>
            </a>
          </div>
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
<section class="bg-yellow">
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






<section>
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

          {!! $project->company->about_builder??'' !!}
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


@endsection