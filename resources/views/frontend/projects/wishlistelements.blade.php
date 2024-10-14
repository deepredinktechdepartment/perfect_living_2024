@auth
    @php
        $isInWishlist = Auth::user()->wishlists()->where('project_id', $project->id)->exists();
    @endphp

    @if ($isInWishlist)
        {{-- Show remove from wishlist button if the project is already in the wishlist --}}
        <form action="{{ route('wishlists.destroy', $project->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="no-button">
                <div class="like-button">
                    <div class="heart-bg">
                        <div class="heart-icon liked"></div> {{-- Apply liked class conditionally --}}
                    </div>
                </div>
            </button>
        </form>
    @else
        {{-- Show add to wishlist button if the project is not in the wishlist --}}
        <form action="{{ route('wishlists.store') }}" method="POST">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <button type="submit" class="no-button">
                <div class="like-button">
                    <div class="heart-bg">
                        <div class="heart-icon"></div> {{-- No liked class for unliked state --}}
                    </div>
                </div>
            </button>
        </form>
    @endif
@else
    {{-- Redirect to login page, saving the intended URL --}}
    <a href="{{ route('userAuthLogin', ['redirect_to' => url()->current()]) }}" class="no-button">
        <i class="fa-regular fa-heart wishlist-icon"></i>
    </a>
@endauth
