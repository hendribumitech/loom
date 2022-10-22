<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineConditions.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCondition->machine_id }}</p>
    </div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineConditions.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCondition->shiftment_id }}</p>
    </div>
</div>

<!-- Start Field -->
<div class="form-group row mb-3">
    {!! Form::label('start', __('models/machineConditions.fields.start').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCondition->start }}</p>
    </div>
</div>

<!-- End Field -->
<div class="form-group row mb-3">
    {!! Form::label('end', __('models/machineConditions.fields.end').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCondition->end }}</p>
    </div>
</div>

<!-- Description Field -->
<div class="form-group row mb-3">
    {!! Form::label('description', __('models/machineConditions.fields.description').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCondition->description }}</p>
    </div>
</div>

