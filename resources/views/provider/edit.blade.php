@extends('layouts.app')

@section('template_title')
    {{ __('تعديل') }} مزود الخدمة
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('تعديل') }} مزود الخدمة</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('providers.update', $provider->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('provider.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
