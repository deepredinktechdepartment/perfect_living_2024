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
                         <p class="mb-0 p-0">{{ $details }}</p>
                                   @if(isset($price) && $price > 0)
                    <p class="mb-0 p-0">
                    <span class="price-info">₹ {{ $price }} per sq.ft</span> <small>Onwards</small>
                    </p>
                    @endif
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
