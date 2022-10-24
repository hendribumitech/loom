<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineResults.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineResult->machine_id }}</p>
    </div>
</div>

<!-- Shiftment Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('shiftment_id', __('models/machineResults.fields.shiftment_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineResult->shiftment_id }}</p>
    </div>
</div>

<!-- Work Date Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_date', __('models/machineResults.fields.work_date').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineResult->work_date }}</p>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group row mb-3">
    {!! Form::label('amount', __('models/machineResults.fields.amount').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineResult->amount }}</p>
    </div>
</div>

<!-- Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('uom_id', __('models/machineResults.fields.uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineResult->uom_id }}</p>
    </div>
</div>

