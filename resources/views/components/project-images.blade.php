<div class="col-sm-8 order-sm-0 order-1">
    <div class="row">
        <!-- First Image (Main Image) -->
        <div class="col-sm-9 col-12 pe-sm-1 mb-sm-0 mb-2">
            @if($project->isNotEmpty())
                @php
                    // Get the first elevation picture
                    $firstPicture = $project->first();
                    $filePath = env('APP_STORAGE').$firstPicture->file_path;
                @endphp

                @if(File::exists($filePath))
                    <a href="{{ URL::to($filePath) }}" data-fancybox="banner_gallery" data-caption="Botanika">
                        <div class="project-overview-images-wrapper h-100">
                            <img src="{{ URL::to($filePath) }}" alt="Main Image" class="img-fluid h-100">
                        </div>
                    </a>
                @else
                    <div class="img-placeholder"></div>
                @endif
            @else
                <div class="img-placeholder"></div>
            @endif
        </div>

        <!-- Additional Images -->
        <div class="col-sm-3 col-12 ps-sm-1 d-sm-block d-none">
            @if($project->count() > 1)
                @foreach($project->slice(1, 3) as $picture)
                    @php
                        $filePath = env('APP_STORAGE').$picture->file_path;
                    @endphp

                    @if(File::exists($filePath))
                        <a href="{{ URL::to($filePath) }}" data-fancybox="banner_gallery" data-caption="Botanika">
                            <div class="project-overview-images-wrapper mb-2">
                                <img src="{{ URL::to($filePath) }}" alt="Additional Image" class="img-fluid h-100">
                            </div>
                        </a>
                    @else
                        <div class="img-placeholder"></div>
                    @endif
                @endforeach
            @else
                <div class="img-placeholder"></div>
            @endif
        </div>
    </div>
</div>
