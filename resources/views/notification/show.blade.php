@extends('layouts.app')

@section('template_title')
    {{ $notification->name ?? "{{ __('Show') Notification" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Notification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('notifications.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $notification->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $notification->description }}
                        </div>
                        <div class="form-group">
                            <strong>Forall:</strong>
                            {{ $notification->forAll }}
                        </div>
                        <div class="form-group">
                            <strong>Receivers:</strong>
                            {{ $notification->receivers }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
