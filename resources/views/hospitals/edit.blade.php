@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Hospital
                </div>
                <div class="float-end">
                    <a href="{{ route('hospitals.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('hospitals.update', $hospital->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('hospital_name') is-invalid @enderror" id="name" name="hospital_name" value="{{ $hospital->hospital_name }}">
                            @if ($errors->has('hospital_name'))
                                <span class="text-danger">{{ $errors->first('hospital_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $hospital->address }}">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="district" class="col-md-4 col-form-label text-md-end text-start">District</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ $hospital->district }}">
                            @if ($errors->has('district'))
                                <span class="text-danger">{{ $errors->first('district') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start">State</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ $hospital->state }}">
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
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