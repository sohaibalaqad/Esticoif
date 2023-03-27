<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url', $provider->url, ['class' => 'form-control' . ($errors->has('url') ? ' is-invalid' : ''), 'placeholder' => 'Url']) }}
            {!! $errors->first('url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idImage1') }}
            {{ Form::text('idImage1', $provider->idImage1, ['class' => 'form-control' . ($errors->has('idImage1') ? ' is-invalid' : ''), 'placeholder' => 'Idimage1']) }}
            {!! $errors->first('idImage1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idImage2') }}
            {{ Form::text('idImage2', $provider->idImage2, ['class' => 'form-control' . ($errors->has('idImage2') ? ' is-invalid' : ''), 'placeholder' => 'Idimage2']) }}
            {!! $errors->first('idImage2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idNo') }}
            {{ Form::text('idNo', $provider->idNo, ['class' => 'form-control' . ($errors->has('idNo') ? ' is-invalid' : ''), 'placeholder' => 'Idno']) }}
            {!! $errors->first('idNo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_type') }}
            {{ Form::text('service_type', $provider->service_type, ['class' => 'form-control' . ($errors->has('service_type') ? ' is-invalid' : ''), 'placeholder' => 'Service Type']) }}
            {!! $errors->first('service_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>