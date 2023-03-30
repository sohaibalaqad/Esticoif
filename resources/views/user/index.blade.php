@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('المستخدمين') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('إضافة جديد') }}
                                </a>
                                 <a href="{{ route('user-types.index') }}" class="btn btn-secondary btn-sm float-right mr-3"  data-placement="left">
                                     {{ __('أنواع المستخدمين') }}
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
										<th>البريد الإلكتروني</th>
										<th>رقم الهاتف</th>
										<th>الحالة</th>
										<th>الجنس</th>
										<th>نوعه</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $user->firstName }} {{ $user->lastName }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->phone_number }}</td>
											<td>
                                                @if($user->act == 0)
                                                    <i class="la la-times-circle"></i> غير مفعل
                                                @elseif($user->act == 1)
                                                    <i class="la la-check-circle"></i> تم التحقق
                                                @elseif($user->act == 2)
                                                    <i class="la la-check-circle"></i> مكتمل البيانات
                                                @elseif($user->act == 3)
                                                    <i class="la la-check-circle"></i> مفعل
                                                @elseif($user->act == 4)
                                                    <i class="la la-check-circle"></i>معطل
                                                @endif
                                            </td>
											<td>
                                                @if($user->gender == 'male')
                                                    <i class="la la-male"></i>
                                                @else
                                                    <i class="la la-female"></i>
                                                @endif
                                            </td>
											<td>{{ $user->userType->name }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="la la-eye"></i> عرض</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="la la-edit"></i> تعديل</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="la la-trash"></i> حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
