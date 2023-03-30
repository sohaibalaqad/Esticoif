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
                            <span class="card-title">{{ __('عرض') }} بيانات المزود</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('providers.index') }}"> {{ __('رجوع') }}</a>
{{--                            @dd($provider->user->act)--}}
                            @if($provider->user->act == 3)
                                <a class="btn btn-danger" href="{{ route('unActive.provider', $provider->user->id ) }}"> {{ __('تعطيل') }}</a>
                            @else
                                <a class="btn btn-success" href="{{ route('active.provider', $provider->user->id ) }}"> {{ __('تفعيل') }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>الأسم :</strong>
                            {{ $provider->user->firstName }} {{ $provider->user->lastName }}
                        </div>
                        <div class="form-group">
                            <strong>البريد الإلكتروني:</strong>
                            {{ $provider->user->email }}
                        </div>
                        <div class="form-group">
                            <strong>رقم الهاتف:</strong>
                            {{ $provider->user->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>رقم الهوية:</strong>
                            {{ $provider->idNo }}
                        </div>
                        <div class="form-group">
                            <strong>الحالة:</strong>
                            @if($provider->user->act == 0)
                                <i class="la la-times-circle"></i> غير مفعل
                            @elseif($provider->user->act == 1)
                                <i class="la la-check-circle"></i> تم التحقق
                            @elseif($provider->user->act == 2)
                                <i class="la la-check-circle"></i> مكتمل البيانات
                            @elseif($provider->user->act == 3)
                                <i class="la la-check-circle"></i> مفعل
                            @elseif($provider->user->act == 4)
                                <i class="la la-check-circle"></i>معطل
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>الجنس:</strong>
                            @if($provider->user->gender == 'male')
                                <i class="la la-male"></i> ذكر
                            @else
                                <i class="la la-female"></i>أنثى
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>المدينة:</strong>
                            {{ $provider->user->city->name }}
                        </div>
                        <div class="form-group">
                            <strong>نوع الخدمة المقدمة:</strong>
                            {{ $provider->service_type }}
                        </div>

                        <div class="form-group">
                            <strong>الرابط :</strong>
                            <a href="{{ $provider->url }}">{{ $provider->url }}</a>
                        </div>
                        <div class="form-group">
                            <img src="data:image/png;base64,{{ $provider->idImage1 }}" alt="Image">
                        </div>
                        <div class="form-group">
                            <img src="data:image/png;base64,{{ $provider->idImage2 }}" alt="Image">
                        </div>

                        <div class="form-group">
                            @foreach($provider->documents as $docs)
                                <img src="data:image/png;base64,{{ $docs->document }}" alt="Image">
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
