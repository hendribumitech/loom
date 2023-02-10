<!-- Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('code', __('models/shiftments.fields.code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/shiftments.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50, 'required' => 'required']) !!}
</div>
</div>

<!-- Start Hour Field -->
<div class="form-group row mb-3">
    {!! Form::label('start_hour', __('models/shiftments.fields.start_hour').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('start_hour', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- End Hour Field -->
<div class="form-group row mb-3">
    {!! Form::label('end_hour', __('models/shiftments.fields.end_hour').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('end_hour', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Overday Field -->
<div class="form-group row mb-3">
    {!! Form::label('overday', __('models/shiftments.fields.overday').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('overday', 0) !!}
        {!! Form::checkbox('overday', '1', null) !!}
    </label>
</div>
</div>

