@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Hospital Information
                </div>
                <div class="float-end">
                    <a href="{{ route('hospitals.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $hospital->hospital_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $hospital->address }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="district" class="col-md-4 col-form-label text-md-end text-start"><strong>District:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $hospital->district }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start"><strong>State:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $hospital->state }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection