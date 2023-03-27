@extends('layouts.app')

@section('template_title')
    {{ $provider->name ?? "{{ __('Show') Provider" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Provider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('providers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $provider->url }}
                        </div>
                        <div class="form-group">
                            <strong>Idimage1:</strong>
                            {{ $provider->idImage1 }}
                        </div>
                        <div class="form-group">
                            <strong>Idimage2:</strong>
                            {{ $provider->idImage2 }}
                        </div>
                        <div class="form-group">
                            <strong>Idno:</strong>
                            {{ $provider->idNo }}
                        </div>
                        <div class="form-group">
                            <strong>Service Type:</strong>
                            {{ $provider->service_type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
