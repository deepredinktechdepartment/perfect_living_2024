@extends('layouts.app')

@section('content')
    <!-- Display table of contacts -->
    @if($contacts->isEmpty())
        <!-- Show this message if no contacts exist -->
        <div class="alert alert-warning" role="alert">
            No data found.
        </div>
    @else
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="contacts">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
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
                                <td>
                                    <!-- Info icon for viewing message -->
                                    <a href="#" class="text-info" data-bs-toggle="modal" data-bs-target="#messageModal"
                                       data-name="{{ $contact->name }}"
                                       data-email="{{ $contact->email }}"
                                       data-phone="{{ $contact->phone }}"
                                       data-message="{{ $contact->message }}">
                                        <i class="{{ config('constants.icons.info') }}"></i>
                                    </a>

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

    <!-- Modal for displaying the contact message -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Contact Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="contactName"></span></p>
                    <p><strong>Email:</strong> <span id="contactEmail"></span></p>
                    <p><strong>Phone:</strong> <span id="contactPhone"></span></p>
                    <p><strong>Message:</strong></p>
                    <p id="contactMessage" class="text-wrap"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var contactModal = document.getElementById('messageModal');

        contactModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-* attributes
            var name = button.getAttribute('data-name');
            var email = button.getAttribute('data-email');
            var phone = button.getAttribute('data-phone');
            var message = button.getAttribute('data-message');

            // Update the modal's content.
            var modalTitle = contactModal.querySelector('.modal-title');
            var modalName = contactModal.querySelector('#contactName');
            var modalEmail = contactModal.querySelector('#contactEmail');
            var modalPhone = contactModal.querySelector('#contactPhone');
            var modalMessage = contactModal.querySelector('#contactMessage');

            modalTitle.textContent = 'Contact Message from ' + name;
            modalName.textContent = name;
            modalEmail.textContent = email;
            modalPhone.textContent = phone;
            modalMessage.textContent = message;
        });
    });
</script>
@endpush

@push('styles')
<style>
    /* Ensure long text in the modal wraps correctly */
    .text-wrap {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
</style>
@endpush
