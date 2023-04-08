<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('hex') }}
            {{ Form::color('hex', $color->hex, ['class' => 'form-control' . ($errors->has('hex') ? ' is-invalid' : ''), 'placeholder' => 'Hex']) }}
            {!! $errors->first('hex', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('ادخل') }}</button>
    </div>
</div>
