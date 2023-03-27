@extends('layouts.app')

@section('template_title')
    {{ $service->name ?? "{{ __('Show') Service" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Enname:</strong>
                            {{ $service->enName }}
                        </div>
                        <div class="form-group">
                            <strong>Arname:</strong>
                            {{ $service->arName }}
                        </div>
                        <div class="form-group">
                            <strong>Frname:</strong>
                            {{ $service->frName }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $service->gender }}
                        </div>
                        <div class="form-group">
                            <strong>City Id:</strong>
                            {{ $service->city_id }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $service->price }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $service->type }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $service->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
