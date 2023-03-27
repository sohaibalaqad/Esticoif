<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('document') }}
            {{ Form::text('document', $document->document, ['class' => 'form-control' . ($errors->has('document') ? ' is-invalid' : ''), 'placeholder' => 'Document']) }}
            {!! $errors->first('document', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('providerId') }}
            {{ Form::text('providerId', $document->providerId, ['class' => 'form-control' . ($errors->has('providerId') ? ' is-invalid' : ''), 'placeholder' => 'Providerid']) }}
            {!! $errors->first('providerId', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>