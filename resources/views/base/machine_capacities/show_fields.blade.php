<!-- Machine Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('machine_id', __('models/machineCapacities.fields.machine_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCapacity->machine_id }}</p>
    </div>
</div>

<!-- Product Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('product_id', __('models/machineCapacities.fields.product_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCapacity->product_id }}</p>
    </div>
</div>

<!-- Capacity Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity', __('models/machineCapacities.fields.capacity').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCapacity->capacity }}</p>
    </div>
</div>

<!-- Capacity Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('capacity_uom_id', __('models/machineCapacities.fields.capacity_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCapacity->capacity_uom_id }}</p>
    </div>
</div>

<!-- Period Uom Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('period_uom_id', __('models/machineCapacities.fields.period_uom_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $machineCapacity->period_uom_id }}</p>
    </div>
</div>

