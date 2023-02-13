<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineAvailabilities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('machine_id', $machineItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineAvailabilities.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('shiftment_id', $shiftmentItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineAvailabilities.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('work_date', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'work_date']) !!}
</div>
</div>

<!-- Duration Target Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_target', __('models/machineAvailabilities.fields.duration_target').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('duration_target', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Duration Off Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_off', __('models/machineAvailabilities.fields.duration_off').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('duration_off', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineAvailabilities.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('uom_id', $uomItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>
