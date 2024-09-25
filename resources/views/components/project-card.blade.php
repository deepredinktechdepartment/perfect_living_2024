@props([
    'name' => '',
    'address' => '',
    'details' => '',
    'price' => '',
    'image' => '',
    'url' => '#'
])
<div class="card_one">
    <div class="project-card-wrapper m-lg-3">
        <a href="{{ $url }}" class="text-decoration-none">
            <div class="row">
                <div class="col-sm-5 pe-sm-0">
                    <div class="project-image-wrapper ">


            <img src="{{ $image }}" alt="{{ $name }}" class="img-fluid project-image ">


                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="project-details-wrapper  p-3">
                        <h5 class="mb-0">{{ $name }}</h5>
                        <p class="mb-1 pb-0"><i class="fa-solid fa-location-dot mb-1 pb-0"></i> {{ $address }}</p>
                        <p class="mb-0 pb-0">{{ $details }}</p>
                    @if(isset($price) && $price > 0)
                    <p class="mb-0 p-0">
                    <span class="price-info">₹ {{ $price }} per sq.ft</span> <small>Onwards</small>
                    </p>
                    @endif

                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
