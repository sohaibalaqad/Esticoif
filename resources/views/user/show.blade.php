@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Firstname:</strong>
                            {{ $user->firstName }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $user->lastName }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Number:</strong>
                            {{ $user->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Secret:</strong>
                            {{ $user->two_factor_secret }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Recovery Codes:</strong>
                            {{ $user->two_factor_recovery_codes }}
                        </div>
                        <div class="form-group">
                            <strong>Two Factor Confirmed At:</strong>
                            {{ $user->two_factor_confirmed_at }}
                        </div>
                        <div class="form-group">
                            <strong>Act:</strong>
                            {{ $user->act }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $user->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Typeid:</strong>
                            {{ $user->typeId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
