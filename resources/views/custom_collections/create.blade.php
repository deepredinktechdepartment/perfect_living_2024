@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Collection</h2>

        @include('customcollections.form', ['projects' => $projects])
    </div>
@endsection
