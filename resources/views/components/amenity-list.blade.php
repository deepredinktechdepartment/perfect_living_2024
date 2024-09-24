@if($amenities && $amenities->count() > 0)
    <section>
        <div class="container">
            <h2 class="mb-4">Amenities</h2>
            <div class="row amenities-slider">
                @foreach($amenities as $amenity)
                <div class="expertise-col col-sm-2 col-4 mb-sm-3 mb-2 px-sm-2 px-1">
                    <div class="amenities-icon">
                        <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid">
                        <p>{{ $amenity->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    <p>No amenities available for this project.</p>
@endif
