<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('الأسم') }}
            {{ Form::text('name', $city->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('الدولة') }}
            {{ Form::select('country_id', \App\Models\Country::pluck('name', 'id'), $city->country_id, ['class' => 'form-control' . ($errors->has('country_id') ? ' is-invalid' : ''), 'placeholder' => 'الدولة']) }}
            {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
