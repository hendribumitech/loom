<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineProductivities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->machine_id }}</p>
    </div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineProductivities.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->shiftment_id }}</p>
    </div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineProductivities.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->work_date }}</p>
    </div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machineProductivities.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->capacity }}</p>
    </div>
</div>

<!-- Capacity Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity_uom_id', __('models/machineProductivities.fields.capacity_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->capacity_uom_id }}</p>
    </div>
</div>

<!-- Duration Target Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_target', __('models/machineProductivities.fields.duration_target').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->duration_target }}</p>
    </div>
</div>

<!-- Duration Off Field -->
<div class="form-group row mb-3">
    {!! Form::label('duration_off', __('models/machineProductivities.fields.duration_off').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->duration_off }}</p>
    </div>
</div>

<!-- Amount Target Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount_target', __('models/machineProductivities.fields.amount_target').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->amount_target }}</p>
    </div>
</div>

<!-- Amount Result Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount_result', __('models/machineProductivities.fields.amount_result').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->amount_result }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineProductivities.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineProductivity->uom_id }}</p>
    </div>
</div>

