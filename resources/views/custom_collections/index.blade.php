@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Collections List</h2>

        <a href="{{ route('customcollections.create') }}" class="btn btn-primary mb-3">Create New Collection</a>

        @if($collections->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Collection Name</th>
                        <th>Projects</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($collections as $collection)
                        <tr>
                            <td>{{ $collection->name }}</td>
                            <td>
                                @foreach($collection->projects as $project)
                                    {{ $project->name }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('customcollections.edit', $collection->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('customcollections.destroy', $collection->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No collections found.</p>
        @endif
    </div>
@endsection
