@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm">

            <form id="unitForm" method="POST" action="{{ isset($unit) ? route('unit_configurations.update', [$project->id, $unit->id]) : route('unit_configurations.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($unit))
                    @method('PUT')
                @endif

                <!-- Hidden field for project_id -->
                <input type="text" name="project_id" value="{{ $project->id }}" hidden>

                <div class="mb-3">
                    <label for="beds" class="form-label">Beds</label>
                    <input id="beds" type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{ old('beds', $unit->beds ?? '') }}" required>
                    @error('beds')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="baths" class="form-label">Baths</label>
                    <input id="baths" type="text" class="form-control @error('baths') is-invalid @enderror" name="baths" value="{{ old('baths', $unit->baths ?? '') }}" required>
                    @error('baths')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="balconies" class="form-label">Balconies</label>
                    <input id="balconies" type="number" class="form-control @error('balconies') is-invalid @enderror" name="balconies" value="{{ old('balconies', $unit->balconies ?? '') }}" required>
                    @error('balconies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="facing" class="form-label">Facing</label>
                    <select id="facing" class="form-control @error('facing') is-invalid @enderror" name="facing" required>
                        <option value="">Select Facing</option> <!-- Default empty option -->
                        <option value="East" {{ old('facing', $unit->facing ?? '') == 'East' ? 'selected' : '' }}>East</option>
                        <option value="West" {{ old('facing', $unit->facing ?? '') == 'West' ? 'selected' : '' }}>West</option>
                        <option value="North" {{ old('facing', $unit->facing ?? '') == 'North' ? 'selected' : '' }}>North</option>
                        <option value="South" {{ old('facing', $unit->facing ?? '') == 'South' ? 'selected' : '' }}>South</option>
                    </select>
                    @error('facing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="unit_size" class="form-label">Unit Size (sq.ft)</label>
                    <input id="unit_size" type="number" class="form-control @error('unit_size') is-invalid @enderror" name="unit_size" value="{{ old('unit_size', $unit->unit_size ?? '') }}" step="0.01" required>
                    @error('unit_size')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="floor_plan" class="form-label">Floor Plan</label>
                    <input id="floor_plan" type="file" class="form-control @error('floor_plan') is-invalid @enderror" name="floor_plan" data-exist="{{ isset($unit->floor_plan) ? 'true' : 'false' }}">

                    @if(isset($unit->floor_plan) && File::exists(env('APP_STORAGE').''.$unit->floor_plan))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$unit->floor_plan) }}" class="mt-3" alt="" style="height: 80px; object-fit: cover;">
                    @else
                        <!-- No existing file message or placeholder -->
                    @endif
                </div>

                <button type="submit" class="btn bg-custom-btn">{{ isset($unit) ? 'Update Unit' : 'Save Unit' }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function () {
        // Initialize jQuery validation
        $('#unitForm').validate({
            rules: {
                beds: {
                    required: true,
                    number: true, // Allows integers and floats
                    min: 0 // Adjust minimum if needed
                },
                baths: {
                    required: true,
                    number: true, // Allows integers and floats
                    min: 0 // Adjust minimum if needed
                },
                balconies: {
                    required: true,
                    number: true,
                    min: 0
                },
                facing: {
                    required: true,
                },
                unit_size: {
                    required: true,
                    number: true,
                    min: 0.1
                },
                floor_plan: {
                    required: function(element) {
                        return $(element).data('exist') === 'false' && !element.files.length;
                    },
                    extension: "jpg|jpeg",
                    filesize: 524288 // 512KB in bytes
                }
            },
            messages: {
                beds: {
                    required: "Please enter the number of beds.",
                    number: "Please enter a valid number.",
                    min: "Beds cannot be less than 0."
                },
                baths: {
                    required: "Please enter the number of baths.",
                    number: "Please enter a valid number.",
                    min: "Baths cannot be less than 0."
                },
                balconies: {
                    required: "Please enter the number of balconies.",
                    number: "Please enter a valid number.",
                    min: "Balconies cannot be less than 0."
                },
                facing: {
                    required: "Please enter the facing direction.",
                },
                unit_size: {
                    required: "Please enter the unit size.",
                    number: "Please enter a valid size.",
                    min: "Unit size must be at least 0.1 sq.ft."
                },
                floor_plan: {
                    required: "Please upload a floor plan.",
                    extension: "Please upload a file in jpg|jpeg format.",
                    filesize: "The file size must be less than 512KB."
                }
            }
        });

        // Add custom method for file size validation
        $.validator.addMethod('filesize', function (value, element, size) {
            if (element.files.length) {
                return element.files[0].size <= size;
            }
            return true;
        }, 'File size must be less than {0} bytes.');

        // Automatically prefill bathrooms input with the same value as beds, and clear baths if beds is empty
        $('#beds').on('input', function () {
            var bedsValue = $(this).val();
            if (bedsValue) {
                $('#baths').val(bedsValue); // Prefill bathrooms input with beds value
            } else {
                $('#baths').val(''); // Clear bathrooms input if beds value is cleared
            }
        });
    });
</script>
@endpush
