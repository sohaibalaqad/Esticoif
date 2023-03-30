@extends('layouts.app')

@section('template_title')
    Country
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الدول') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('إضافة دولة جديدة') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>

										<th>الأسم</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $country->name }}</td>

                                            <td>
                                                <form action="{{ route('countries.destroy',$country->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('countries.show',$country->id) }}"><i class="la la-eye"></i> {{ __('عرض') }}</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('countries.edit',$country->id) }}"><i class="la la-edit"></i> {{ __('تعديل') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="la la-trash"></i> {{ __('حذف') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $countries->links() !!}
            </div>
        </div>
    </div>
@endsection
