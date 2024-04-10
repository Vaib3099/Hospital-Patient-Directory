@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Hospital List</div>
    <div class="card-body">
        @can('create-hospital')
            <a href="{{ route('hospitals.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Hospital</a>
        @endcan
        @if(count($hospitals) > 0)
        <a href="{{ route('hospital.export') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Export All Hospitals</a>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hospitals as $hospital)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $hospital->hospital_name }}</td>
                    <td>{{ $hospital->state }}</td>
                    <td>
                        <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('hospitals.show', $hospital->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-hospital')
                                <a href="{{ route('hospitals.edit', $hospital->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-hospital')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this hospital?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Hospital Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $hospitals->links() }}

    </div>
</div>
@endsection