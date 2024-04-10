@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Patient List</div>
    <div class="card-body">
        @can('create-patient')
            <a href="{{ route('patients.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Patient</a>
        @endcan
        @if(count($patients) > 0)
        <a href="{{ route('patient.export') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Export All Patients</a>
        @endif
        <div class="mb-3">
            <form action="{{ route('patients.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-3">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request()->input('start_date') }}">
                </div>
                <div class="form-group mr-3">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request()->input('end_date') }}">
                </div>
                <div class="form-group mr-3">
                    <label for="hospital_id">Hospital:</label>
                    <select name="hospital_id" id="hospital_id" class="form-control">
                        <option value="">All Hospitals</option>
                        @foreach($hospitals as $hospital)
                            <option value="{{ $hospital->id }}" {{ request()->input('hospital_id') == $hospital->id ? 'selected' : '' }}>{{ $hospital->hospital_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                @if(request()->has('start_date') || request()->has('end_date') || request()->has('hospital_id'))
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Clear</a> <!-- Conditionally render Clear button -->
                @endif
            </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone_number }}</td>
                    <td>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-patient')
                                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-patient')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this patient?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Patient Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $patients->links() }}

    </div>
</div>
@endsection