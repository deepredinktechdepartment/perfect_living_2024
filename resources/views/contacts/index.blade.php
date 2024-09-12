@extends('layouts.app')

@section('content')
    <!-- Check if there are contacts -->
    @if($contacts->isEmpty())
        <!-- Show this message if no contacts exist -->
        <div class="alert alert-warning" role="alert">
            No data found.
        </div>
    @else
        <!-- Display table of contacts -->
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="contacts">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                <td>
                                    <!-- Delete button using FontAwesome icon inside a form -->
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="delete-form" style="display:inline;">
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
@endsection

@push('scripts')
<!-- Add any custom scripts here if necessary -->
@endpush
