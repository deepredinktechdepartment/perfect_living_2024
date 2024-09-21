@extends('layouts.frontend_theme.main')
@section('mainContent')
<div class="container">
    <h1>Your Wishlist</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($wishlists as $wishlist)
                <tr>
                    <td>{{ $wishlist->project->name }}</td>
                    <td>
                        <form action="{{ route('wishlists.destroy', $wishlist->project_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No projects in your wishlist.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
