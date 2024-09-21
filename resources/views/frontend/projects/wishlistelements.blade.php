@php
    $isInWishlist = Auth::user()->wishlists()->where('project_id', $project->id)->exists();
@endphp

@if ($isInWishlist)
    {{-- Show remove from wishlist button if the project is already in the wishlist --}}
    <form action="{{ route('wishlists.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="no-button">
            <i class="fa-solid fa-heart wishlist-icon-hover text-brand"></i>
        </button>
    </form>
@else
    {{-- Show add to wishlist button if the project is not in the wishlist --}}
    <form action="{{ route('wishlists.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <button type="submit" class="no-button">
            <i class="fa-regular fa-heart wishlist-icon"></i>
        </button>
    </form>
@endif
