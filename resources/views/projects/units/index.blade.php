@extends('layouts.app')

@section('title', 'Unit Configurations')

@section('content')


<div class="row">
    <div class="col-lg-12">
            @if ($units->isEmpty())

                <div class="alert alert-info">
                    No companies found. <a href="{{ route('unit_configurations.create', ['projectID' => $project->id]) }}"><u>Add a New Unit</u></a>
                </div>
            @else
            <div class="card shadow-sm rounded">
                <div class="card-body">

                    <table class="table table-bordered mt-3 bg-white">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No.</th>
                                <th>Beds</th>
                                <th>Baths</th>
                                <th>Balconies</th>
                                <th>Facing</th>
                                <th>Unit Size (sq ft)</th>
                                <th>Floor Plan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->beds }}</td>
                                    <td>{{ $unit->baths }}</td>
                                    <td>{{ $unit->balconies }}</td>
                                    <td>{{ $unit->facing ?? 'N/A' }}</td>
                                    <td>{{ $unit->unit_size }}</td>
                                    <td>

                                        @if(isset($unit->floor_plan) && File::exists(env('APP_STORAGE').''.$unit->floor_plan))
                                            <a href="{{ URL::to(env('APP_STORAGE').''.$unit->floor_plan) }}" target="_blank">View</a>
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('unit_configurations.edit', [$project->id, $unit->id]) }}" class="no-button"><i class="{{ config('constants.icons.edit') }}"></i></a>

                                        <form action="{{ route('unit_configurations.destroy', [$project->id, $unit->id]) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="no-button"><i class="{{ config('constants.icons.delete') }}"></i></button>
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
    </div>
    </div>
@endsection
