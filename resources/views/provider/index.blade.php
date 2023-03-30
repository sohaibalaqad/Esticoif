@extends('layouts.app')

@section('template_title')
    Provider
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('مزودي الخدمات') }}
                            </span>

                             <div class="float-right">
{{--                                <a href="{{ route('providers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('Create New') }}--}}
{{--                                </a>--}}
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
                                        <th>رقم الهوية</th>
										<th>نوع الخدمة</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $provider->user->firstName }} {{ $provider->user->lastName }}</td>
                                            <td>{{ $provider->idNo }}</td>
											<td>{{ $provider->service_type }}</td>

                                            <td>
                                                <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('providers.show',$provider->id) }}"><i class="la la-eye"></i> {{ __('عرض') }}</a>
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('providers.edit',$provider->id) }}"><i class="la la-edit"></i> {{ __('Edit') }}</a>--}}
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
                {!! $providers->links() !!}
            </div>
        </div>
    </div>
@endsection
