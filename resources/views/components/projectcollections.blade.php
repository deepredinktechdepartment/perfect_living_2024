<!-- resources/views/components/projectcollections.blade.php -->

<div class="highlights-images-item col-sm-4 p-2">
    <div class="highlights-images-wrapper">
        <a href="{{ $link ?? '#' }}" class="text-decoration-none">
            <img src="{{ URL::to($imageSrc) }}" alt="{{ $altText }}" class="img-fluid">
            <div class="highlights-images-text">
                <p class="hover-text text-white text-end"><i class="fa-solid fa-arrow-up-right-from-square"></i></p>
                <p class="text-white mb-0">{!! $description !!}</p>
            </div>
        </a>
    </div>
</div>
