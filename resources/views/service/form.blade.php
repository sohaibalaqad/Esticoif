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
            {{ Form::select('gender', ['male'=> 'ذكر', 'female'=>'أنثى'],$service->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'الجنس']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('المدينة') }}
            {{ Form::select('city_id', \App\Models\City::pluck('name', 'id') , $service->city_id, ['class' => 'form-control' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => 'المدينة']) }}
            {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('السعر') }}
            {{ Form::text('price', $service->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'السعر']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('النوع') }}
            {{ Form::select('type',['barber' => 'barber','hairdresser' => 'hairdresser','Nail care' => 'Nail care','Spa servicen' => 'Spa servicen'], $service->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'النوع']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('اللون') }}
            {{ Form::select('color',[1 => 'نعم',0 => 'لا'], $service->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'اللون']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('الوصف (بالنجليزي)') }}
            {{ Form::textarea('enDescription', $service->enDescription, ['class' => 'form-control' . ($errors->has('enDescription') ? ' is-invalid' : ''), 'placeholder' => 'الوصف (بالنجليزي)']) }}
            {!! $errors->first('enDescription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف (بالعربي)') }}
            {{ Form::textarea('arDescription', $service->arDescription, ['class' => 'form-control' . ($errors->has('arDescription') ? ' is-invalid' : ''), 'placeholder' => 'الوصف (بالعربي)']) }}
            {!! $errors->first('arDescription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الوصف (بالفرنسي)') }}
            {{ Form::textarea('frDescription', $service->frDescription, ['class' => 'form-control' . ($errors->has('frDescription') ? ' is-invalid' : ''), 'placeholder' => 'الوصف (بالفرنسي) ']) }}
            {!! $errors->first('frDescription', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('صورة') }}
            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '')]) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
