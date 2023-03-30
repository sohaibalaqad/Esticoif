<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الأسم الأول') }}
            {{ Form::text('firstName', $user->firstName, ['class' => 'form-control' . ($errors->has('firstName') ? ' is-invalid' : ''), 'placeholder' => 'الأسم الأول']) }}
            {!! $errors->first('firstName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الأسم الأخير') }}
            {{ Form::text('lastName', $user->lastName, ['class' => 'form-control' . ($errors->has('lastName') ? ' is-invalid' : ''), 'placeholder' => 'الأسم الأخير']) }}
            {!! $errors->first('lastName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('البريد الإلكتروني') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'البريد الإلكتروني']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('رقم الهاتف') }}
            {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'رقم الهاتف']) }}
            {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Str::contains(Route::currentRouteName(), 'create'))
            <div class="form-group">
                {{ Form::label('كلمة المرور') }}
                {{ Form::text('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'كلمة المرور']) }}
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('الجنس') }}
            {{ Form::select('gender', ['male'=> 'ذكر', 'female'=>'أنثى'],$user->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'الجنس']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('نوعه') }}
            {{ Form::select('typeId', \App\Models\UserType::pluck('name', 'id') , $user->typeId, ['class' => 'form-control' . ($errors->has('typeId') ? ' is-invalid' : ''), 'placeholder' => 'نوعه']) }}
            {!! $errors->first('typeId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('المدينة') }}
            {{ Form::select('city_id', \App\Models\City::pluck('name', 'id') , $user->city_id, ['class' => 'form-control' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => 'المدينة']) }}
            {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">ادخل</button>
    </div>
</div>
