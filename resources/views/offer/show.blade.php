@extends('layouts.app')

@section('template_title')
    {{ $offer->name ?? "{{ __('Show') Offer" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Offer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('offers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Providerid:</strong>
                            {{ $offer->providerId }}
                        </div>
                        <div class="form-group">
                            <strong>Serviceuserid:</strong>
                            {{ $offer->serviceUserId }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $offer->price }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $offer->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
