@extends('layouts.app')

@section('content')




    <!-- Check if there are any pictures -->
    @if($pictures->isEmpty())
    <div class="alert alert-info">
            <p>No elevation pictures found for this project. <a href="{{ route('elevation_pictures.create', ['projectID' => $project->id]) }}" ><u>Add a Picture</u></a></p>
        </div>
    @else
        <!-- Table to display pictures -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pictures as $picture)
                    <tr>
                        <td>{{ $picture->title }}</td>
                        <td><img src="{{ Storage::url($picture->file_path) }}" alt="{{ $picture->title }}" style="height: 100px;"></td>
                        <td>
                            <a href="{{ route('elevation_pictures.edit', $picture->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('elevation_pictures.destroy', $picture->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
