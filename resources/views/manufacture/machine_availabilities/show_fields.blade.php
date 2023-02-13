<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineAvailabilities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->machine_id }}</p>
    </div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineAvailabilities.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->shiftment_id }}</p>
    </div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineAvailabilities.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->work_date }}</p>
    </div>
</div>

<!-- Duration Target Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_target', __('models/machineAvailabilities.fields.duration_target').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->duration_target }}</p>
    </div>
</div>

<!-- Duration Off Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_off', __('models/machineAvailabilities.fields.duration_off').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->duration_off }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineAvailabilities.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineAvailability->uom_id }}</p>
    </div>
</div>

