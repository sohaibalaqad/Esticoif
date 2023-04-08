@extends('layouts.app')

@section('template_title')
    Color
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('الألوان') }}
                            </span>

                             <div class="float-right">
                                 <form method="POST" action="{{ route('colors.store') }}"  role="form" class="float-right" enctype="multipart/form-data">
                                     @csrf
                                     <div class="box-body">

                                         <div class="row">

                                             <div class="col" style="width: 90px;">
                                                 {{ Form::color('hex', '', ['class' => 'form-control' . ($errors->has('hex') ? ' is-invalid' : '')]) }}
                                                 {!! $errors->first('hex', '<div class="invalid-feedback">:message</div>') !!}
                                             </div>

                                             <div class="col">

                                                 <button type="submit" class="btn btn-sm btn-primary">{{ __('أضف') }}</button>
                                             </div>
                                         </div>

                                     </div>
                                 </form>

{{--                                <a href="{{ route('colors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
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

										<th>Hex</th>
										<th>اللون</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $color)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $color->hex }}</td>
											<td>
                                                <i class="la la-square" style=" color: {{ $color->hex }}; font-size: 26pt"></i>
                                            </td>

                                            <td>
                                                <form action="{{ route('colors.destroy',$color->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('colors.show',$color->id) }}"><i class="la la-eye"></i> {{ __('Show') }}</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('colors.edit',$color->id) }}"><i class="la la-edit"></i> {{ __('تعديل') }}</a>
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
                {!! $colors->links() !!}
            </div>
        </div>
    </div>
@endsection
