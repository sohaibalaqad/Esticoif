<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('userId') }}
            {{ Form::text('userId', $serviceUser->userId, ['class' => 'form-control' . ($errors->has('userId') ? ' is-invalid' : ''), 'placeholder' => 'Userid']) }}
            {!! $errors->first('userId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('serviceId') }}
            {{ Form::text('serviceId', $serviceUser->serviceId, ['class' => 'form-control' . ($errors->has('serviceId') ? ' is-invalid' : ''), 'placeholder' => 'Serviceid']) }}
            {!! $errors->first('serviceId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evaluation') }}
            {{ Form::text('evaluation', $serviceUser->evaluation, ['class' => 'form-control' . ($errors->has('evaluation') ? ' is-invalid' : ''), 'placeholder' => 'Evaluation']) }}
            {!! $errors->first('evaluation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $serviceUser->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>