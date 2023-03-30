@extends('layouts.app')

@section('template_title')
    Update User Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">تحديث بيانات نوع مستخدم</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-types.update', $userType->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
