@extends('layouts.app')

@section('template_title')
    الأشعارات
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الأشعارات') }}
                            </span>

                             <div class="float-right">
{{--                                <a href="{{ route('notifications.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
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

										<th>العنوان</th>
										<th>الوصف</th>
										<th>للكل؟</th>
										<th>التاريخ</th>

{{--                                        <th></th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $notification->title }}</td>
											<td>{{ $notification->description }}</td>
											<td>
                                                @if($notification->forAll  == true)
                                                    <i class="la la-check-circle-o"></i>
                                                @else
                                                    <i class="la la-close"></i>
                                                @endif
                                            </td>
											<td>{{ $notification->created_at }}</td>

{{--                                            <td>--}}
{{--                                                <form action="{{ route('notifications.destroy',$notification->id) }}" method="POST">--}}
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('notifications.show',$notification->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>--}}
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('notifications.edit',$notification->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $notifications->links() !!}
            </div>
        </div>
    </div>
@endsection
