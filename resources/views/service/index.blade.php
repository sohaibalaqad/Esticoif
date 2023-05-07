@extends('layouts.app')

@section('template_title')
    Service
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الخدمات') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('أضافة خدمة') }}
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

										<th>الأسم (بالنجليزي)</th>
										<th>الأسم (بالعربي)</th>
										<th>الأسم (بالفرنسي)</th>
										<th>الجنس</th>
										<th>المدينة</th>
										<th>السعر</th>
										<th>النوع</th>
										<th>اللون</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $service->enName }}</td>
											<td>{{ $service->arName }}</td>
											<td>{{ $service->frName }}</td>
											<td>@if($service->gender == 'male')
                                                    <i class="la la-male"></i>
                                                @else
                                                    <i class="la la-female"></i>
                                                @endif</td>
											<td>{{ $service->city->name }}</td>
											<td>{{ $service->price }}</td>
											<td>{{ $service->type }}</td>
											<td>
                                                @if($service->color == 1)
                                                    <i class="la la-check-circle"></i>
                                                @else
                                                    <i class="la la-close"></i>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('services.show',$service->id) }}"><i class="la la-eye"></i> {{ __('عرض') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('services.edit',$service->id) }}"><i class="la la-edit"></i> {{ __('تعديل') }}</a>
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
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
