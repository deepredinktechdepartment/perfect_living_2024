<!-- resources/views/components/floor-plan-item.blade.php -->
@props(['image_path' => '#', 'description' => '', 'size' => ''])

<div class="floorplans-item col-sm-4 p-2">
    <div class="floorplans-images-wrapper">
        <img src="{{ $image_path }}" alt="{{ $description }}" class="img-fluid">
        <div class="floorplans-info-text">
            <h6 class="mb-0">{{ $description }}</h6>
            <h6>{{ $size }} Sq.ft</h6>
        </div>
    </div>
</div>