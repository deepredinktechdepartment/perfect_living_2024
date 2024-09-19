<div class="col-sm-3">
    <div class="project-card-wrapper">
        <a href="{{ $url }}" class="text-decoration-none">
            <div class="project-image-wrapper h-100">
                <img src="{{ $image }}" alt="{{ $name }}" class="img-fluid project-image h-100">
            </div>
            <div class="project-details-wrapper h-100 p-3">
                <div>
                    <h5 class="mb-0">{{ $name }}</h5>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $address }}</p>
                    <h5 class="mb-2">{{ $price }}</h5>
                    <p>{{ $details }}</p>
                </div>
            </div>
        </a>
    </div>
</div>
