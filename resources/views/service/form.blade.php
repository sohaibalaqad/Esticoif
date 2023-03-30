<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الأسم (بالنجليزي)') }}
            {{ Form::text('enName', $service->enName, ['class' => 'form-control' . ($errors->has('enName') ? ' is-invalid' : ''), 'placeholder' => 'الأسم (بالنجليزي)']) }}
            {!! $errors->first('enName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الأسم (بالعربي)') }}
            {{ Form::text('arName', $service->arName, ['class' => 'form-control' . ($errors->has('arName') ? ' is-invalid' : ''), 'placeholder' => 'الأسم (بالعربي)']) }}
            {!! $errors->first('arName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الأسم (بالفرنسي)') }}
            {{ Form::text('frName', $service->frName, ['class' => 'form-control' . ($errors->has('frName') ? ' is-invalid' : ''), 'placeholder' => 'الأسم (بالفرنسي)']) }}
            {!! $errors->first('frName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الجنس') }}
            {{ Form::select('gender', ['male'=> 'ذكر', 'female'=>'أنثى'],$service->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Gender']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('المدينة') }}
            {{ Form::select('city_id', \App\Models\City::pluck('name', 'id') , $service->city_id, ['class' => 'form-control' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => 'City Id']) }}
            {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('السعر') }}
            {{ Form::text('price', $service->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('النوع') }}
            {{ Form::select('type',['barber' => 'barber','hairdresser' => 'hairdresser','chaser' => 'chaser','beautician' => 'beautician'], $service->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'النوع']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف') }}
            {{ Form::textarea('description', $service->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'الوصف']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
