@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Color
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('تعديل') }} اللون</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colors.update', $color->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('color.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
