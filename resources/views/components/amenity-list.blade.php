@if($amenities && $amenities->count() > 0)
    <section>
        <div class="container">
            <h2 class="mb-4">Amenities</h2>
            <div class="amenities-list d-none d-lg-block"> <!-- Display this only on large screens -->
                <div class="row">
                    @foreach($amenities as $amenity)
                        <div class="expertise-col col-sm-2 col-4 mb-2 px-2"> <!-- Adjust this for large screens -->
                            <div class="amenities-icon text-center">
                                <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid">
                                <p>{{ $amenity->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="amenities-slider d-lg-none"> <!-- Display this only on small screens -->
                @foreach($amenities->chunk(9) as $amenityChunk) <!-- Group amenities into chunks of 10 -->
                    <div class="slide"> <!-- Each slide contains 10 amenities -->
                        <div class="row">
                            @foreach($amenityChunk as $amenity)
                                <div class="expertise-col col-4 mb-2 px-2"> <!-- Show 3 amenities per row -->
                                    <div class="amenities-icon text-center">
                                        <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid">
                                        <p>{{ $amenity->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@else

@endif
