<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('firstName') }}
            {{ Form::text('firstName', $user->firstName, ['class' => 'form-control' . ($errors->has('firstName') ? ' is-invalid' : ''), 'placeholder' => 'Firstname']) }}
            {!! $errors->first('firstName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lastName') }}
            {{ Form::text('lastName', $user->lastName, ['class' => 'form-control' . ($errors->has('lastName') ? ' is-invalid' : ''), 'placeholder' => 'Lastname']) }}
            {!! $errors->first('lastName', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone_number') }}
            {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number']) }}
            {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('two_factor_secret') }}
            {{ Form::text('two_factor_secret', $user->two_factor_secret, ['class' => 'form-control' . ($errors->has('two_factor_secret') ? ' is-invalid' : ''), 'placeholder' => 'Two Factor Secret']) }}
            {!! $errors->first('two_factor_secret', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('two_factor_recovery_codes') }}
            {{ Form::text('two_factor_recovery_codes', $user->two_factor_recovery_codes, ['class' => 'form-control' . ($errors->has('two_factor_recovery_codes') ? ' is-invalid' : ''), 'placeholder' => 'Two Factor Recovery Codes']) }}
            {!! $errors->first('two_factor_recovery_codes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('two_factor_confirmed_at') }}
            {{ Form::text('two_factor_confirmed_at', $user->two_factor_confirmed_at, ['class' => 'form-control' . ($errors->has('two_factor_confirmed_at') ? ' is-invalid' : ''), 'placeholder' => 'Two Factor Confirmed At']) }}
            {!! $errors->first('two_factor_confirmed_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('act') }}
            {{ Form::text('act', $user->act, ['class' => 'form-control' . ($errors->has('act') ? ' is-invalid' : ''), 'placeholder' => 'Act']) }}
            {!! $errors->first('act', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gender') }}
            {{ Form::text('gender', $user->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Gender']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('typeId') }}
            {{ Form::text('typeId', $user->typeId, ['class' => 'form-control' . ($errors->has('typeId') ? ' is-invalid' : ''), 'placeholder' => 'Typeid']) }}
            {!! $errors->first('typeId', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>