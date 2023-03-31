@extends('layouts.app')

@section('template_title')
    {{ $position->name ?? "{{ __('Show') Position" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Position</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('positions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lang:</strong>
                            {{ $position->lang }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $position->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Userid:</strong>
                            {{ $position->userId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
