@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($menu->id) ? 'Edit Menu' : 'Create Menu' }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($menu->id) ? route('menus.update', $menu->id) : route('menus.store') }}" method="POST">
            @csrf
            @if (isset($menu->id))
                @method('PUT')
            @endif

            <div class="row">
                <!-- Card for Name, URL fields, and Active/Inactive status -->
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $menu->url) }}" required>
                                <small class="form-text text-muted">
                                    Go to list of page <a href="{{ URL::to('projects') }}" target="_blank">click here</a>
                                </small>
                            </div>

                            @php
                            // Ensure $active is defined and has a default value
                            $active = $menu->active ?? 1;
                        @endphp

                        <div class="form-group">
                            <label>Active</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <!-- Compare values as integers -->
                                        <input type="radio" name="active" id="active-yes" value="1" class="form-check-input" {{ old('active', $active) == '1' ? 'checked' : '' }}>
                                        <label for="active-yes" class="form-check-label">Yes</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="active" id="active-no" value="0" class="form-check-input" {{ old('active', $active) == '0' ? 'checked' : '' }}>
                                        <label for="active-no" class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

                <!-- Card for Position selection and new position addition -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="" disabled selected>Select a position</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position }}" {{ old('position', $menu->position) === $position ? 'selected' : '' }}>
                                            {{ $position }}
                                        </option>
                                    @endforeach
                                    <option value="add-new">Add New Position</option>
                                </select>
                                <button type="button" id="add-position" class="btn btn-secondary mt-2">Add New Position</button>
                            </div>

                            <div id="new-position-container" class="d-none">
                                <div class="form-group">
                                    <label for="new-position">New Position</label>
                                    <input type="text" name="new_position" id="new-position" class="form-control">
                                </div>
                                <button type="button" id="save-new-position" class="btn bg-persian-green mt-2">Save Position</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn bg-persian-green mt-3">{{ isset($menu->id) ? 'Update' : 'Create' }}</button>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addPositionButton = document.getElementById('add-position');
            const saveNewPositionButton = document.getElementById('save-new-position');
            const newPositionContainer = document.getElementById('new-position-container');
            const positionDropdown = document.getElementById('position');
            const newPositionInput = document.getElementById('new-position');

            addPositionButton.addEventListener('click', function() {
                newPositionContainer.classList.toggle('d-none');
            });

            positionDropdown.addEventListener('change', function() {
                if (positionDropdown.value === 'add-new') {
                    newPositionContainer.classList.remove('d-none');
                } else {
                    newPositionContainer.classList.add('d-none');
                }
            });

            saveNewPositionButton.addEventListener('click', function() {
                const newPosition = newPositionInput.value.trim();
                if (newPosition) {
                    const option = document.createElement('option');
                    option.value = newPosition;
                    option.textContent = newPosition;
                    positionDropdown.appendChild(option);
                    positionDropdown.value = newPosition; // Select the new option
                    newPositionInput.value = ''; // Clear the input
                    newPositionContainer.classList.add('d-none'); // Hide the new position input
                }
            });
        });
    </script>
    @endpush
@endsection
