<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $notification->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $notification->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('forAll') }}
            {{ Form::text('forAll', $notification->forAll, ['class' => 'form-control' . ($errors->has('forAll') ? ' is-invalid' : ''), 'placeholder' => 'Forall']) }}
            {!! $errors->first('forAll', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receivers') }}
            {{ Form::text('receivers', $notification->receivers, ['class' => 'form-control' . ($errors->has('receivers') ? ' is-invalid' : ''), 'placeholder' => 'Receivers']) }}
            {!! $errors->first('receivers', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>