<!-- resources/views/components/card.blade.php -->
@props([
    'title' => '',
    'number' => '',
    'bgColor' => 'bg-primary', // Default background color
    'link' => '#', // Default link
])

<a href="{{ $link }}" class="card {{ $bgColor }} text-white text-decoration-none mb-4">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div class="me-3">
            <h3 class="card-title mb-0 text-white">{{ $title }}</h3>
        </div>
        <div>
            <h2 class="card-text mb-0 text-white" style="font-size: 2rem;">{{ $number }}</h2>
        </div>
    </div>
</a>
