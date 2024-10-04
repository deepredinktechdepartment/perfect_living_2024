@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">


    @if($searchLogs->isEmpty())
        <p>No data found.</p>
    @else


            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <table class="table table-bordered mt-3 bg-white" id="searchLogsTable">
            <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>User ID</th> --}}
                    <th>Search Keyword</th>
                    <th>IP Address</th>
                    <th>Location</th>
                    <th>Device</th>
                    <th>Platform</th>
                    <th>Browser</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($searchLogs as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $log->user_id ?? 'Guest' }}</td> --}}
                    <td>{{ $log->keyword }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->location }}</td>
                    <td>{{ $log->device }}</td>
                    <td>{{ $log->platform }}</td>
                    <td>{{ $log->browser }}</td>
                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td> <!-- Format date as needed -->
                    <td>
                        <!-- Delete Form -->
                        <form action="{{ route('search-logs.destroy', $log->id) }}"  method="POST" class="delete-form" style="display:inline;">
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
    @endif



</div>
</div>
@endsection
