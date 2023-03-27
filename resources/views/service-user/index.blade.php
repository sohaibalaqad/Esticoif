@extends('layouts.app')

@section('template_title')
    Service User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Service User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('service-users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Userid</th>
										<th>Serviceid</th>
										<th>Evaluation</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceUsers as $serviceUser)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviceUser->userId }}</td>
											<td>{{ $serviceUser->serviceId }}</td>
											<td>{{ $serviceUser->evaluation }}</td>
											<td>{{ $serviceUser->status }}</td>

                                            <td>
                                                <form action="{{ route('service-users.destroy',$serviceUser->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('service-users.show',$serviceUser->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('service-users.edit',$serviceUser->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviceUsers->links() !!}
            </div>
        </div>
    </div>
@endsection
