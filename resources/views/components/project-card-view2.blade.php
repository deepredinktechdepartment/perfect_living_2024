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
                  <p class="mb-1 pb-0"><i class="fa-solid fa-location-dot mb-1 pb-0"></i> {{ $address }}</p>
                    @if($details)
                    <p class="mb-0 p-0">{{ $details }}</p>
                   <p class="mb-0 pb-0">{{ $projecttype??''}}</p>
                    @endif
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
