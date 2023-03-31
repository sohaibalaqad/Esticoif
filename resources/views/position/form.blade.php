<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lang') }}
            {{ Form::text('lang', $position->lang, ['class' => 'form-control' . ($errors->has('lang') ? ' is-invalid' : ''), 'placeholder' => 'Lang']) }}
            {!! $errors->first('lang', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $position->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userId') }}
            {{ Form::text('userId', $position->userId, ['class' => 'form-control' . ($errors->has('userId') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userId', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>