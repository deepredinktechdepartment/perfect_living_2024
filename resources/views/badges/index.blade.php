@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($badges->isEmpty())
            <div class="alert alert-info">
                No badges found. <a href="{{ route('badges.create') }}"><u>Create a Badge</u></a>
            </div>
        @else
        <div class="card shadow-sm rounded">
            <div class="card-body">
        <div class="table-responsive">
                    <table class="table table-bordered mt-3 bg-white" id="badges">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($badges as $badge)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $badge->name }}</td>
                                <td>
                                    <a href="{{ route('badges.edit', $badge->id) }}" class="btn btn-link" title="Edit">
                                        <i class="{{ config('constants.icons.edit') }}"></i>
                                    </a>
                                    <form action="{{ route('badges.destroy', $badge->id) }}" method="POST" class="delete-form" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="no-button" title="Delete">
                                            <i class="{{ config('constants.icons.delete') }}"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        @endif
    </div>
</div>
@endsection
