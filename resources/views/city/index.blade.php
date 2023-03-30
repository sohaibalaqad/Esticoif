@extends('layouts.app')

@section('template_title')
    City
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('المدن') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cities.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('إضافة مدينة') }}
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
										<th>الدولة</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $city->name }}</td>
											<td>{{ $city->country->name }}</td>

                                            <td>
                                                <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('cities.show',$city->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('cities.edit',$city->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('تعديل') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('حذف') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cities->links() !!}
            </div>
        </div>
    </div>
@endsection
