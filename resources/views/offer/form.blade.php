<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('providerId') }}
            {{ Form::text('providerId', $offer->providerId, ['class' => 'form-control' . ($errors->has('providerId') ? ' is-invalid' : ''), 'placeholder' => 'Providerid']) }}
            {!! $errors->first('providerId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('serviceUserId') }}
            {{ Form::text('serviceUserId', $offer->serviceUserId, ['class' => 'form-control' . ($errors->has('serviceUserId') ? ' is-invalid' : ''), 'placeholder' => 'Serviceuserid']) }}
            {!! $errors->first('serviceUserId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $offer->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $offer->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>