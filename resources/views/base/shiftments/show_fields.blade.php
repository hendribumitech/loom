<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/shiftments.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shiftment->code }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/shiftments.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $shiftment->name }}</p>
    </div>
</div>

