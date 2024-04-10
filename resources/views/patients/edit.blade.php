@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Patient
                </div>
                <div class="float-end">
                    <a href="{{ route('patients.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('patients.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="name" name="patient_name" value="{{ $patient->patient_name }}">
                            @if ($errors->has('patient_name'))
                                <span class="text-danger">{{ $errors->first('patient_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="age" class="col-md-4 col-form-label text-md-end text-start">Age</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ $patient->age }}">
                            @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-end text-start">Phone Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $patient->phone_number }}">
                            @if ($errors->has('phone_number'))
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hospital_id" class="col-md-4 col-form-label text-md-end text-start">Hospital</label>
                        <div class="col-md-6">
                            <select name="hospital_id" id="hospital_id" class="form-select" required>
                                @foreach($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}" {{ $patient->hospital_id == $hospital->id ? 'selected' : '' }}>{{ $hospital->hospital_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('hospital_id'))
                                <span class="text-danger">{{ $errors->first('hospital_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="photo" class="col-md-4 col-form-label text-md-end text-start">Photo</label>
                        <div class="col-md-6">
                            @if($patient->photo)
                                <img src="{{ asset('storage/'.$patient->photo) }}" alt="Patient Photo" class="img-fluid mt-2" style="max-width: 200px;">
                            @endif


                            <input type="file" class="form-control" id="photo" name="photo">


                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection