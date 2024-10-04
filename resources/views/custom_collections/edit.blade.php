@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Collection</h2>

        @include('customcollections.form', ['projects' => $projects, 'collection' => $collection])
    </div>
@endsection
