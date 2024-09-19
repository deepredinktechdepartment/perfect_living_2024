<div class="col-sm-3">
    <div class="card_two">
        <div class="project-card-wrapper">
            <a href="{{ $url }}" class="text-decoration-none">
                <div class="project-image-wrapper">
                    <img src="{{ $image }}" alt="{{ $name }}" class="img-fluid project-image">
                </div>
                <div class="project-details-wrapper p-3">
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
</div>
