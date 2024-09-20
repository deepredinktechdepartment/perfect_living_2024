
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<section>
<div class="container">
<div class="row">
<div class="col-sm-8 order-sm-0 order-2">
    <div class="mb-sm-3">
<h1>{{ $pageTitle??'' }}</h1>
<p class="mt-4">Login. </p>
</div>
</div>
</div>
</div>
</section>

@endsection
