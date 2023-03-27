@extends('layouts.app')

@section('template_title')
    {{ $city->name ?? "{{ __('Show') City" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} City</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cities.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $city->name }}
                        </div>
                        <div class="form-group">
                            <strong>Country Id:</strong>
                            {{ $city->country_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
