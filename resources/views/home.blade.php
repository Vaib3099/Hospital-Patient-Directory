@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>
                    @canany(['create-roles', 'edit-roles', 'delete-roles'])
                        <a class="btn btn-light dashbox border border-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-light dashbox border border-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany
                    @canany(['create-hospital', 'edit-hospital', 'delete-hospital'])
                        <a class="btn btn-light dashbox border border-warning" href="{{ route('hospitals.index') }}">
                            <i class="bi bi-bag"></i> Manage Hospital</a>
                    @endcanany
                    @canany(['create-patient', 'edit-patient', 'delete-patient'])
                        <a class="btn btn-light dashbox border border-info" href="{{ route('patients.index') }}">
                            <i class="bi bi-bag"></i> Manage Patient</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
