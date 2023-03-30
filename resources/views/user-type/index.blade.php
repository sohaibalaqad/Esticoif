@extends('layouts.app')

@section('template_title')
    User Type
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('أنواع المستخدمين') }}
                            </span>

                             <div class="float-right">
                                 <form method="POST" action="{{ route('user-types.store') }}"  role="form" enctype="multipart/form-data">
                                     @csrf
                                     <div class="row">
                                         <div class="col">
                                             {{ Form::text('name', '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'الأسم']) }}
                                             {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                         </div>
                                         <div class="col">
                                             <button type="submit" class="btn btn-primary">إضافة</button>
                                         </div>
                                     </div>

                                 </form>
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
                                    @foreach ($userTypes as $userType)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $userType->name }}</td>

                                            <td>
                                                <form action="{{ route('user-types.destroy',$userType->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('user-types.show',$userType->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('user-types.edit',$userType->id) }}"><i class="fa fa-fw fa-edit"></i> تعديل</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
