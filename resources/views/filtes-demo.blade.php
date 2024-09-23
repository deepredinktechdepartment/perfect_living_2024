@extends('layouts.app')

@section('content')
    <h1>Filtered Results</h1>

    @if ($builders)
        <p>Builder: {{ $builders }}</p>
    @endif

    @if ($collection)
        <p>Collection: {{ $collection }}</p>
    @endif

    @if ($topLocations)
        <p>Top Location: {{ $topLocations }}</p>
    @endif

    @if ($budgets)
        <p>Budget: {{ $budgets }}</p>
    @endif

    @if ($project)
        <p>Project: {{ $project }}</p>
    @endif

    <p>Display filtered results based on the selected parameters.</p>
@endsection
