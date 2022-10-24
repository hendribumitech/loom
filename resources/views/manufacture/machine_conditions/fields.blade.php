<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineConditions.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineConditions.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('shiftment_id', $shiftmentItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineConditions.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('work_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'work_date']) !!}
</div>
</div>

<!-- Start Field -->
<div class="form-group row mb-3">
    {!! Form::label('start', __('models/machineConditions.fields.start').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('start', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( config('local.datetime')),'id'=>'start']) !!}
</div>
</div>

<!-- End Field -->
<div class="form-group row mb-3">
    {!! Form::label('end', __('models/machineConditions.fields.end').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('end', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( config('local.datetime')),'id'=>'end']) !!}
</div>
</div>

<!-- Description Field -->
<div class="form-group row mb-3">
    {!! Form::label('description', __('models/machineConditions.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3,'maxlength' => 200, 'required' => 'required']) !!}
</div>
</div>
