<!-- resources/views/components/projectcollections.blade.php -->

<div class="highlights-images-item col-sm-4 p-2">
    <div class="highlights-images-wrapper">
        <a href="{{ $link ?? '#' }}" target="_new">
            <img src="{{ URL::to($imageSrc) }}" alt="{{ $altText }}" class="img-fluid">
            <div class="highlights-images-text">
                <p class="text-white mb-0">{!! $description !!}</p>
            </div>
        </a>
    </div>
</div>
