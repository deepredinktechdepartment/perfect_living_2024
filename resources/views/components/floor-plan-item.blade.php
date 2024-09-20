<!-- resources/views/components/floor-plan-item.blade.php -->
@props(['image_path' => '#', 'description' => '', 'size' => ''])

<div class="floorplans-item col-sm-4 p-2">
<a href="{{ $image_path }}" data-fancybox="floorplan_images" data-caption="{{ $description }} {{ $size }} Sq.ft" class="text-decoration-none">
    <div class="floorplans-images-wrapper">
        <div class="floorplans-image">
        <img src="{{ $image_path }}" alt="{{ $description }}" class="img-fluid">
        <p class="mb-0 zoom-text">Click to Zoom &nbsp; <i class="fa-solid fa-magnifying-glass-plus"></i></p>
    </div>
        <div class="floorplans-info-text">
        <h5 class="mb-0">{{ $description }} <br>{{ $size }} Sq.ft</h5>

        </div>
    </div>
</a>
</div>
