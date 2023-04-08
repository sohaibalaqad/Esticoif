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
                            <span class="card-title">{{ __('عرض') }} خدمة {{ $service->arName }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> {{ __('رجوع') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>الأسم (بالنجليزي):</strong>
                            {{ $service->enName }}
                        </div>
                        <div class="form-group">
                            <strong>الأسم (بالعربي):</strong>
                            {{ $service->arName }}
                        </div>
                        <div class="form-group">
                            <strong>الأسم (بالفرنسي):</strong>
                            {{ $service->frName }}
                        </div>
                        <div class="form-group">
                            <strong>الجنس:</strong>
                            @if($service->gender == 'male')
                                <i class="la la-male"></i> ذكر
                            @else
                                <i class="la la-female"></i>أنثى
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>المدينة:</strong>
                            {{ $service->city->name}}
                        </div>
                        <div class="form-group">
                            <strong>السعر:</strong>
                            {{ $service->price }}
                        </div>
                        <div class="form-group">
                            <strong>النوع:</strong>
                            {{ $service->type }}
                        </div>
                        <div class="form-group">
                            <strong>الوصف (بالنجليزي):</strong>
                            {{ $service->enDescription }}
                        </div>
                        <div class="form-group">
                            <strong>الوصف (بالعربي):</strong>
                            {{ $service->arDescription }}
                        </div>
                        <div class="form-group">
                            <strong>الوصف (بالفرنسي):</strong>
                            {{ $service->frDescription }}
                        </div>
                        <div class="form-group">
                            <img src="{{ $service->imageUrl }}" alt="" srcset="">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
