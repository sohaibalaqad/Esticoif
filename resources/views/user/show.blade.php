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
                            <span class="card-title">عرض بيانات {{ $user->firstName }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>الأسم الأول:</strong>
                            {{ $user->firstName }}
                        </div>
                        <div class="form-group">
                            <strong>الأسم الأخير:</strong>
                            {{ $user->lastName }}
                        </div>
                        <div class="form-group">
                            <strong>البريد الإلكتروني:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>رقم الهاتف:</strong>
                            {{ $user->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>الحالة:</strong>
                            @if($user->act == 0)
                                <i class="la la-times-circle"></i> غير مفعل
                            @elseif($user->act == 1)
                                <i class="la la-check-circle"></i> تم التحقق
                            @elseif($user->act == 2)
                                <i class="la la-check-circle"></i> مكتمل البيانات
                            @elseif($user->act == 3)
                                <i class="la la-check-circle"></i> مفعل
                            @elseif($user->act == 4)
                                <i class="la la-check-circle"></i>معطل
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>الجنس:</strong>
                            @if($user->gender == 'male')
                                <i class="la la-male"></i> ذكر
                            @else
                                <i class="la la-female"></i>أنثى
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>نوعه:</strong>
                            {{ $user->userType->name  }}
                        </div>
                        <div class="form-group">
                            <strong>المدينة:</strong>
                            {{ $user->city->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
