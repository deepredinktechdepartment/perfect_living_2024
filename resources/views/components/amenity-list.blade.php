@if($amenities && $amenities->count() > 0)
    <section>
        <div class="container">
            <h2 class="mb-4">Amenities</h2>
            <div class="row amenities-slider">
                @foreach($amenities as $amenity)
                <div class="expertise-col">
                    <div class="amenities-icon">
                        <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="lazy loaded" width="90" height="90">
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
